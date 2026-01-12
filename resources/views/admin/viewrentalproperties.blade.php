@include('layouts.header')

@yield('main')

    <!--End of the Navbar-->

    <!--Customer Form-->
    <link rel="stylesheet" href="css/mBox.css">
    <div class="customer_form">

      <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
      </div>

      <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="#" style="color: gold;"> <i class="bi bi-gear mr-2"></i> PIFFERS Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
      </div>

      <div class="tab-content" id="myTabContent">

        <h5 class="mt-3" style="font-weight: 700;">
          Branches and Head Office
        </h5>
        @foreach($branches as $branch)
            <tr>
                <td>{{$branch->branch_id}}</td>
                <td>{{$branch->branch_office_name}}</td>
            </tr>

            <!-- Loop through the rental properties associated with this branch -->
            @foreach($branch->rentals as $rental)
                <tr>
                    <td>{{$rental->rp_no}}</td>
                    <td>{{$rental->type}}</td>
                </tr>
            @endforeach
        @endforeach
      </div>
    </div>

@include('layouts.footer')
