@include('layouts.header')

@yield('main')

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="customer_form">

    <h4><b><i><button type="button" class="btn btn-link" onclick="history.back()"><i class="bi bi-arrow-left"></i></button> PIFFERS INVENTORY MANAGEMENT</i></b></h4>
    <style>
        /* Style for centering the image */
        .centered-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>



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

    <img src="{{ asset('updatebg.png') }}" style="width: 25%; margin-left: 5%;" alt="Centered Image" class="centered-image" usemap="#workflowMap">
    <map name="workflowMap">
            <area shape="circle" coords="200,70,70" href="{{ route('vendor') }}" alt="Vendor Registration" title="01. Vendor Registration">
            <area shape="circle" coords="310,150,70" href="{{ route('req') }}" alt="Create Requisition" title="02. Create Requisition">
            <area shape="circle" coords="270,300,70" href="{{ route('inventory.dashboard') }}" alt="Stock Issuance & Receive" title="03. Stock Issuance & Receive">
            <area shape="circle" coords="100,300,70" href="{{ route('purchase.order') }}" alt="Purchase Order" title="04. Purchase Order">
            <area shape="circle" coords="70,150,70" href="{{ route('billing') }}" alt="Billing Details" title="05. Billing Details">
            <!-- Center circle (Procure, 3-Way Match & Pay) can be optional or styled differently -->

        </map>
        <div class="label" id="label1" style="position: absolute; background-color: rgba(255, 255, 255, 0.7); padding: 5px; border-radius: 5px; cursor: move; top: 22%; left: 59%; font-size: 19px; font-family: 'Roboto', sans-serif;">
            <a href="{{ route('vendor') }}" style="text-decoration: none; color: inherit;">01. Vendor Registration</a>
        </div>

        <div class="label" id="label1" style="position: absolute; background-color: rgba(255, 255, 255, 0.7); padding: 5px; border-radius: 5px; cursor: move; top: 38%; left: 68%; font-size: 19px; font-family: 'Roboto', sans-serif;">
            <a href="{{ route('req') }}" style="text-decoration: none; color: inherit;">02. Create Requisition</a>
        </div>

        <div class="label" id="label2" style="position: absolute; background-color: rgba(255, 255, 255, 0.7); padding: 5px; border-radius: 5px; cursor: move; top: 60%; left: 65%; font-size: 19px; font-family: 'Roboto', sans-serif;">
            <a href="{{ route('inventory.dashboard') }}" style="text-decoration: none; color: inherit;">03. Stock Issuance & Receive</a>
        </div>

        <div class="label" id="label3" style="position: absolute; background-color: rgba(255, 255, 255, 0.7); padding: 5px; border-radius: 5px; cursor: move; top: 60%; left: 32%; font-size: 19px; font-family: 'Roboto', sans-serif;">
            <a href="{{ route('purchase.order') }}" style="text-decoration: none; color: inherit;">04. Purchase Order</a>
        </div>

        <div class="label" id="label4" style="position: absolute; background-color: rgba(255, 255, 255, 0.7); padding: 5px; border-radius: 5px; cursor: move; top: 36%; left: 31%; font-size: 19px; font-family: 'Roboto', sans-serif;">
            <a href="{{ route('billing') }}" style="text-decoration: none; color: inherit;">05. Billing Details</a>
        </div>

        <div class="label" id="label1" style="position: absolute; background-color: rgba(255, 255, 255, 0.7); padding: 5px; border-radius: 5px; cursor: move; top: 46%; left: 52%; font-size: 10px; font-weight: 900;">Procure, <br> 3-Way Match & <br> Pay</div>

    </div>


    <script>
    // Ensure the image map works with dynamic routing
    document.querySelectorAll('area').forEach(area => {
        area.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = this.getAttribute('href');
        });
    });

    // Sidebar functions (if not already defined)
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }
</script>

