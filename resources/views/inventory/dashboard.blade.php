@include('layouts.header')

@yield('main')

<div class="customer_form">
    <div id="header-container" style="display: flex; justify-content: space-between; align-items: center; padding: 10px; background-color: purple; width:115%; margin-left: -78px; margin-top: -13px;">
        <div id="left-header">
            <h5 style="font-family: 'Poppins', sans-serif; color: white;"><b><i>PIFFERS INVENTORY MANAGEMENT SYSTEM</i></b></h5>
        </div>
        <div id="right-header">
            <button class="openbtn" onclick="openNav()">☰</button>
        </div>
    </div>

    <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="{{ route('logout') }}"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>

        <div class="d-flex align-items-center">
          <button type="button" class="btn btn-link" onclick="history.back()"><i class="bi bi-arrow-left"></i></button>
              <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-weight: bold;">Inventory</h4>
        </div>

    <div class="container mt-4">
        <div class="row">
            <!-- First row: 3 cards -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Store</h5>
                        <a href="{{ route('inventory.category') }}" class="btn btn-primary">Add</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Categories</h5>
                        <a href="{{ route('inventory.subcategory') }}" class="btn btn-primary">Add</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Articles</h5>
                        <a href="{{ route('inventory.articles') }}" class="btn btn-primary">Add</a>
                    </div>
                </div>
            </div>
        </div>
               <div class="col-md-12 mb-2 mt-2">
                <div class="card">
                    <div class="card-body " style="text-align:justify;">
                      "Please use 'Add Store,' 'Add Category,' and 'Add Articles' only when adding a new store, category,
or article that you want to appear in the 'Received from Vendor' and 'Internal Dispatch' sections."
                    </div>
                </div>
            </div>
        <div class="row">
            <!-- Second row: 2 cards -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Received From Vendor</h5>
                        <a href="{{ route('inventory.received') }}" class="btn btn-primary">Add</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Internal Dispatch</h5>
                        <a href="{{ route('internal.dispatch') }}" class="btn btn-primary">Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }
</script>
</body>
</html>

