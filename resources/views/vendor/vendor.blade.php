@include('layouts.header')

@yield('main')
<!--End of the Navbar-->

<!--Customer Form-->
<div class="customer_form">


@include('headerlogout')

    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches"
                    type="button" role="tab" aria-controls="branches" aria-selected="true"> Total Vendors
            </button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <!--Toggle tab- Status Form-->
        <!--Main-->
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
            <div class="modal-header border-0">

                <div class="modal-header border-0 d-flex align-items-center" style="margin-left:-37px;">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-weight: bold;"> Procure to Pay (P2P)</h4>
                </div>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>

            <div class="new_branch mt-2 mb-3">
                <a href="{{ route('post.vendor') }}"><button data-toggle="modal" data-target="#add_user">
                    + Add Vendor
                </button></a>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6">
                    <h4><i><b>Import Vendors:</b></i></h4>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </form>
                </div>

                <div class="col-lg-6">
                    <h4><i><b>Search Vendors:</b></i></h4>

                    <!-- Search Form -->
                    <div class="input-group mb-3">
                        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for Vendor ID or Name..." class="form-control mb-3" style="width : 40%;">
                    </div>
                </div>
            </div>

            <table class="table table-bordered table-striped table-fixed mt-2" id="vendorTable">
                <thead>
                    <tr>
                        <th>Vendor ID</th>
                        <th>Vendor Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vendors as $vendor)
                    <tr>
                        <td>{{ $vendor->vendor_id }}</td>
                        <td>{{ $vendor->vendor_name }}</td>
                        <td>{{ $vendor->vendor_email }}</td>
                        <td>{{ $vendor->vendor_website }}</td>
                        <td>
                            <a href="{{ route('vendor.edit', $vendor->id) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i> </a>

                            <a href="{{ route('vendor.view', $vendor->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-eye"></i></a>

                                <a href="{{ route('vendor.destroy', $vendor->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this vendor?');"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Search script -->
<script>
function searchTable() {
    // Declare variables
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("vendorTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 1; i < tr.length; i++) { // Skip the header row
        tr[i].style.display = "none"; // Hide the row initially
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1 && (j === 0 || j === 1)) { // Only search Vendor ID and Name
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
}
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>

</html>
