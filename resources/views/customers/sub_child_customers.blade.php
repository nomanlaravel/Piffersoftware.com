@include('layouts.header')

@yield('main')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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

    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches"
                type="button" role="tab" aria-controls="branches" aria-selected="true"> Total Customers
            </button>
        </li>
    </ul>
    <div class="modal-header border-0">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                     <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="mt-3" style="font-weight: 700;"> Sub Child Customers: </h5>
                </div>
              </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-bordered table-striped table-fixed mt-3">
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
                        @foreach ($subCustomers as $customer)
                            <tr>
                                <td>{{ $customer->customers_id }}</td>
                                <td>{{ $customer->customers_name }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->customers_region }}</td>
                                <td>
                                    <a href="{{ route('viewcustomer', ['id' => $customer->id]) }}">
                                        <i class="material-icons" style="color: rgb(92, 92, 255);">visibility</i>
                                    </a>
                                    <!--<a class="btn btn-danger" href="{{ route('sub_child_customers', ['customer_id' => $customer->customers_id]) }}">-->
                                    <!--    View Sub-Customers-->
                                    <!--</a>-->
                                    <!-- @if (Auth::user()->role != 'customer' && Auth::user()->role != 'client')-->
                                    <!--    <a href="{{ route('editcustomer', ['id' => $customer->id]) }}" class="ml-2">-->
                                    <!--        <i class="material-icons" style="color: rgb(57, 221, 57);">edit</i>-->
                                    <!--    </a>-->
                                    <!--@endif-->
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
        </div>
    </div>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function () {
    function searchCustomers() {
        var searchText = $('#customer-search').val().toLowerCase();
        $.ajax({
            url: "{{ route('search.customers') }}",
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

    $('#customer-search').on('input', searchCustomers);
});
</script>
