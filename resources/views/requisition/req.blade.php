@include('layouts.header')

@yield('main')
<!--End of the Navbar-->

<!--Customer Form-->
<div class="customer_form">

     <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>

    <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>

    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches"
                    type="button" role="tab" aria-controls="branches" aria-selected="true"> Total Requisition
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
                    <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-weight: bold;"> Requisition </h4>
                </div>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="new_branch mt-2 mb-3">
                <a href="{{ route('postreq') }}"><button data-toggle="modal" data-target="#add_user">
                    + Add Requisition
                </button></a>
            </div>
            
            <div class="row mt-3">

                <div class="col-lg-6">
                    <h4><i><b>Search here:</b></i></h4>
                
                    <!-- Search Form -->
                    <div class="input-group mb-3">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search here...">
                    </div>
                </div>
            </div>

            @if ($reqs->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Requisition Number</th>
                            <th>Item Name</th>
                            <th>Item Code</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reqs as $req)
                            @foreach ($req->reqreports as $report)
                                <tr>
                                    <td>{{ $report->date }}</td>
                                    <td>{{ $report->requisition_no }}</td>
                                    <td>{{ $report->item_name }}</td>
                                    <td>{{ $report->item_code }}</td>
                                    <td>{{ $report->quantity }}</td>
                                   <td>
                                        <div style="display: flex; gap: 10px;">
                                            <a href="{{ route('edit.req', $req->id) }}" class="btn btn-primary" style="height: 30px; width: 80px; text-align: center; display: inline-block;">Edit</a>
                                            <a href="{{ route('view.req', $req->id) }}" class="btn btn-primary" style="height: 30px; width: 80px; text-align: center; display: inline-block;">View</a>
                                            <!--<form action="{{ route('delete.req', ['id' => $req->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this requisition?')" style="display: inline-block;">-->
                                            <!--    @csrf-->
                                            <!--    @method('DELETE')-->
                                            <!--    <button type="submit" class="btn btn-danger" style="height: 30px; width: 120px;">Delete</button>-->
                                            <!--</form>-->
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No requisitions found.</p>
            @endif

        </div>
    </div>

    
<!--Customer form ends here-->
</div>

<script>
    document.getElementById("submit-city").addEventListener("click", function() {
        var customCategory = document.getElementById("custom-city").value;
        var select = document.getElementById("catagory");
        var option = document.createElement("option");
        option.text = customCategory;
        option.value = customCategory;
        select.add(option);
    });
</script>

<script>
    $(document).ready(function() {
        $('#searchInput').on('input', function() {
            var searchText = $(this).val().trim().toLowerCase();

            // Loop through each table row and hide/show based on search input
            $('tbody tr').each(function() {
                var requisitionNumber = $(this).find('td:eq(1)').text().trim().toLowerCase();

                if (requisitionNumber.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
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






