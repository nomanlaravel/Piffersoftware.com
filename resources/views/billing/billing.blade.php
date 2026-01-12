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
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration
            Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>

    <div class="tab-content" id="myTabContent">
        <!--Toggle tab- Status Form-->
        <!--Main-->
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">

          <div class="d-flex align-items-center mt-4">
            <button type="button" class="btn btn-link" onclick="history.back()"><i class="bi bi-arrow-left"></i></button>
            <h5 class="mt-3" style="font-weight: 700;">
                Billing Details
                </h5>
            </div>
            <div class="new_branch mt-2">
                <a href="{{ route('billing.submission') }}"><button>+ Add Bill</button></a>
            </div>

            <table class="table table-bordered table-striped table-fixed mt-2">
                <thead>
                    <tr>
                        <th>Bill Date</th>
                        <th>Vendor</th>
                        <th>PO Number</th>
                        <th>Bill Number</th>
                        <th>Payment Terms</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="chamber-table-body">
                    @foreach($billings as $billing)
                    <tr>
                        <th>{{$billing->bill_date}}</th>
                        <td>{{$billing->vendor}}</td>
                        <td>{{$billing->po_number}}</td>
                        <td>{{$billing->bill_number}}</td>
                        <td>{{$billing->payment_terms}}</td>
                        <td style="display:flex; gap: 10px; align-items: center;">
                            <a href="{{ route('view.billing', ['id' => $billing->id]) }}" class="btn btn-primary" style="width:40%; height:80%;">View</a>
                            <a href="{{ route('edit.billing', ['id' => $billing->id]) }}" class="btn btn-primary" style="width:50%; height:80%;">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
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



