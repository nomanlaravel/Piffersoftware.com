<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJW5_mifeg4pTLOW_Hgx70vDhU4osTceg&libraries=places"></script>
  <script src="node_modules/jspdf/dist/jspdf.umd.min.js"></script>
  {{--
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> --}}
  <!-- Include html2pdf library using CDN -->
  <!-- jsPDF for PDF export -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

  <!-- SheetJS for Excel export -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

  <!-- FileSaver for Word export -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/PapaParse/5.3.0/papaparse.min.js"></script>


  <title>Document</title>
  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
  @stack('css')
  <style>
    .col-lg-3,
    .col-lg-2,
    .col-lg-1,
    .col-lg-4,
    .col-lg-5,
    .col-lg-6 {
      position: static;
    }

    @font-face {
      font-family: montserrta;
      src: url(Montserrat/Montserrat-Regular.ttf);
    }

    .btn-group-btn button {
      color: white;
      background-color: transparent;
      text-decoration: none;
    }

    .btn-group-btn button:hover {
      color: white;
      background-color: rgb(0, 0, 0);
      text-decoration: none;
    }

    .add-more-btn {
      border: 0;
      border-radius: 15px;
      color: #ebebeb;
      background-color: #37b42a;
      width: 100%;
      height: 30px;
      font-weight: 600;
    }

    .remove-btn {
      border: 0;
      border-radius: 15px;
      color: #ebebeb;
      background-color: #ff0000;
      width: 100%;
      height: 30px;
      font-weight: 600;
    }

    .check-box {
      font-size: large;
      margin-top: 1%;
    }

    select {
      height: 27px;
    }

    .input_field {
      border: 1px solid;
      padding: 2px;
      box-shadow: 1px 1px 3px rgb(227, 227, 227);
      font-size: small;
    }

    .liscence_form {
      border-style: groove;
      padding: 1%;
    }

    @media screen and (min-width: 200px) {
      .spacing-left {
        padding-left: 1;
      }

      .spacing-right {
        padding-left: 1;
      }
    }

    @media screen and (min-width: 992px) {
      .spacing-left {
        padding-left: 0.7%;
      }

      .spacing-right {
        padding-right: 0.7%;
      }
    }

    .fillable-field {
      text-decoration: none;
    }

    .sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      right: 0%;
      background-color: rgb(60, 60, 60);
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidebar a {
      padding: 4px 4px 4px 16px;
      text-decoration: none;
      color: white;
      display: block;
      transition: 0.3s;
      font-weight: 500;
      font-size: .90rem;
      margin-bottom: 5%;
    }

    .sidebar a:hover {
      color: white;
      background-color: black;
    }

    .sidebar .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    .openbtn {
      font-size: 25px;
      cursor: pointer;
      background-color: rgb(255, 255, 255);
      color: brown;
      font-weight: 700;
      border: none;
    }

    #main {
      transition: all 1s ease-in-out;
      padding: 16px;
      border: none;
      background-color: white;
    }

    .liscence_form {
      border-style: groove;
      padding: 1%;
    }

    .modal-content {
      background: linear-gradient(to bottom, #ffffff 0%, #ededed 100%);
    }

    .input_field {
      border: 1px solid;
      padding: 3px;
      box-shadow: 3px 3px 5px rgb(222, 222, 222);
      font-weight: 600;
    }

    .btn-secondary {
      background-color: rgb(167, 167, 167);
      border-radius: 12px;
      border-color: transparent;
      /* width: 20%;
      height: 30px; */
      font-size: small;
      font-weight: 600;
    }

    .btn-primary {
      background-color: rgb(105, 196, 48);
      border-radius: 12px;
      border-color: transparent;
      /* width: 20%;
      height: 30px; */
      font-size: small;
      font-weight: 600;
    }

    .nav-tabs .nav-link.active {
      font-weight: 600;
      border-bottom-color: rgb(0, 161, 0);
      border-bottom-width: thick;
      background-color: transparent;
    }

    .nav-tabs .nav-link {
      font-family: Arial, Helvetica, sans-serif;
    }

    #user-table {
      border: 0px solid;
      padding: 20px;
      box-shadow: 5px 5px 10px rgb(233, 233, 233);
      border-radius: 6px;
    }

    .navbar-dark .navbar-nav .active>.nav-link,
    .navbar-dark .navbar-nav .nav-link.active,
    .navbar-dark .navbar-nav .nav-link.show,
    .navbar-dark .navbar-nav .show>.nav-link.active:hover {
      background-color: black;
    }

    .drop-down:active {
      font-weight: 600;
      border-bottom-color: rgb(0, 161, 0);
      border-bottom-width: thick;
      background-color: transparent;
    }

    .dropup .dropdown-toggle::after {
      display: contents;
    }

    .dropdown-menu .icon-button {
      background-color: transparent;
    }

    .dropup .dropdown-menu {
      border: 0;
      /* margin-left: 37%; */
      background-color: white;
    }

    .drop-down02 {
      position: relative;
    }

    .drop-down02 .sub-menu02 {
      position: absolute !important;
      left: 100%;
      top: 0;
    }

    .drop-down02 .dropdown-toggle {
      padding: .25rem 1.1rem !important;
    }

    @media screen and (max-width :767px) {
      .drop-down02 .sub-menu02 {
        position: static !important;
      }
    }

    .dropdown-menu {
      background-color: transparent;
    }

    .dropdown-toggle::after {
      display: none;
    }

    .customer_form {
      padding: 1%;
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-size: small;
      font-weight: bold;
      margin-bottom: 50px !important;
    }

    .dropdown-item {
      background-color: rgb(60, 60, 60);
      color: white;
    }

    .dropdown-item:hover {
      background-color: rgb(0, 0, 0);
      color: white;
    }

    .navbar-dark .navbar-nav .nav-link:hover {
      background-color: black;
    }

    .bi-gear-wide::before {
      margin-left: 5%;
      color: rgb(38, 147, 255);
    }

    .bi-chevron-right::before {
      float: right;
      padding-top: 5%;
      font-size: 70%;
      padding-right: 15%;
    }

    .bi-caret-down-square::before {
      font-size: normal;
      margin-left: 30%;
    }

    .bi-trash::before {
      color: red;
      padding-left: 100%;
      font-size: large;
    }

    .bi-pencil-square::before {
      color: blue;
      padding-left: 100%;
      font-size: large;
    }

    .bi-arrow-up-circle::before {
      color: rgb(122, 186, 27);
      padding-left: 100%;
      font-size: large;
      position: relative
    }

@media screen and (min-width:992px) {

      .navbar,
      .navbar-expand-lg,
      .navbar-collapse,
      .navbar-expand-lg .navbar-nav,
      .container-fluid {
        flex-direction: column;
        flex-wrap: wrap;
        padding-left: 0%;
      }

      .navbar-dark .navbar-nav .nav-link {
        color: #ffffff;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        width: 120%;
        font-size: 1.0rem;
        overflow-x: auto;
      }

      .navbar {
        width: 15%;
        height: 100vh;
        max-height: 100vh;
        float: left;
        align-items: flex-start;
        position: fixed;
        top: 0;
        overflow-y: auto;
        z-index: 1000;
      }

      .navbar .container-fluid {
        align-items: flex-start;
        padding-left: 0%;
      }

      .customer_form {
        width: 75%;
        margin-left: 16%;
      }

      .navbar-expand-lg .navbar-nav .dropdown-menu {
        flex-direction: row;
        left: 122%;
        top: 0%;
        padding: 0%;
        background-color: rgb(60, 60, 60);
        color: #fff;
      }

      .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: 0.5rem;
        padding-left: 1.6rem;
      }
    }

    .table td {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-weight: 500;
      color: grey
    }

    .table {
      width: 100%;
    }

    .navbar-brand {
      margin-left: 0.5rem;
    }

    .new_branch button {
      margin: 1%;
      color: #fff;
      background-color: rgb(105, 196, 48);
      border: 0ch;
      border-radius: 12px;
      width: 125%;
      height: 2rem;
      font-weight: bold;
    }

    .new_branch {
      width: 15%;
      margin-left: 80%;
    }

    .new_branches button {
      margin: 1%;
      color: #fff;
      background-color: rgb(105, 196, 48);
      border: 0ch;
      border-radius: 12px;
      width: 20%;
      /* Set a fixed width, so the buttons don't extend beyond the container */
      height: 2rem;
      font-weight: bold;
    }

    @media screen and (max-width:420px) {

      .table td,
      .table th {
        font-size: 10px;
        font-weight: bold;
      }
    }

    @media screen and (max-width:340px) {

      .table td,
      .table th {
        font-size: 8px;
        font-weight: bold;
      }
    }

    @media screen and (max-width:300px) {

      .table td,
      .table th {
        font-size: 6px;
        font-weight: bold;
      }
    }

    .navbar {
      background: radial-gradient(circle, rgba(50, 0, 86, 1) 81%, rgba(59, 0, 102, 1) 99%);
    }

    .admin-setting {
      background: radial-gradient(circle, rgba(50, 0, 86, 1) 81%, rgba(59, 0, 102, 1) 99%);
    }

    .head-heading a {
      text-decoration: none;
      color: black;
    }

    p {
      text-align: center;
    }

    body {
      overflow-x: hidden;
    }
  </style>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

  <!-- jQuery (MUST be before Select2 & Bootstrap JS) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
  <div class="form_full">
    <nav class="navbar navbar-expand-lg navbar-dark" style=" background-color: rgb(60, 60, 60);">
      <div class="container-fluid">
        <img src="{{ asset('logo.png') }}"
          style="width: 55%; height: 46%; margin: 0%; margin-left: 28%; margin-top:20px;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            {{-- Dashboard --}}
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ url('/home') }}"
                style="color: gold; background-color: transparent;">Dashboard</a>
            </li>

            {{-- Regulatory Affairs --}}
        @php
    $isCustomer = auth()->check() && auth()->user()->role === 'customer';
@endphp

@if(
    $isCustomer ||
    auth()->user()->can('view_regulator') ||
    auth()->user()->can('view_corporate') ||
    auth()->user()->can('view_chamber') ||
    auth()->user()->can('add_regulator') ||
    auth()->user()->can('add_corporate') ||
    auth()->user()->can('add_chamber') ||
    auth()->user()->can('update_regulator') ||
    auth()->user()->can('update_corporate') ||
    auth()->user()->can('update_chamber') ||
    auth()->user()->can('delete_regulator') ||
    auth()->user()->can('delete_corporate') ||
    auth()->user()->can('delete_chamber')
)
<li class="nav-item">

  <a class="nav-link" data-toggle="collapse" href="#regulatorySubMenu"
     aria-expanded="false" aria-controls="regulatorySubMenu">

    <span class="menu-title">Regulatory Affairs</span>
    <i class="mdi mdi-home menu-icon"></i>

  </a>

  <div class="collapse" id="regulatorySubMenu">
    <ul class="nav flex-column sub-menu">

      {{-- Regulator --}}
      @if($isCustomer || auth()->user()->can('view_regulator'))
        <li class="nav-item">
          <a class="nav-link" href="{{ url('regulator') }}">Regulator</a>
        </li>
      @endif

      {{-- Corporate --}}
      @if($isCustomer || auth()->user()->can('view_corporate'))
        <li class="nav-item">
          <a class="nav-link" href="{{ url('corporate') }}">Corporate</a>
        </li>
      @endif

      {{-- Chamber --}}
      @if($isCustomer || auth()->user()->can('view_chamber'))
        <li class="nav-item">
          <a class="nav-link" href="{{ url('chamber') }}">Chamber</a>
        </li>
      @endif

    </ul>
  </div>

</li>
@endif
            {{-- Admin --}}
            @canany(['view_branche', 'add_branche', 'update_branche', 'delete_branche','view_region', 'add_region', 'update_region', 'delete_region', 'view_rental', 'add_rental', 'update_rental', 'delete_rental'])
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#companiesSubMenu" aria-expanded="false"
                  aria-controls="companiesSubMenu">
                  <span class="menu-title">Admin</span>
                  <i class="mdi mdi-home menu-icon"></i>
                </a>
                <div class="collapse" id="companiesSubMenu">
                  <ul class="nav flex-column sub-menu">
                    @can('view_branche')
                      <li class="nav-item"><a class="nav-link" href="{{ url('admin') }}">Branches</a></li>
                    @endcan
                    
                      <li class="nav-item"><a class="nav-link" href="{{ url('region') }}">Regions</a></li>
                    
                    @can('view_rental')
                      <li class="nav-item"><a class="nav-link" href="{{ url('rental') }}">Rental</a></li>
                    @endcan
                  </ul>
                </div>
              </li>
            @endcanany

            {{-- Customers --}}
            @can('view_customer')
              <li class="nav-item"><a class="nav-link" href="{{ route('customer') }}"
                  style="background-color: transparent;">Customers</a></li>
            @endcan

            {{-- HRM --}}
            @canany(['view_staff', 'add_staff', 'update_staff', 'delete_staff'])
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#hrmSubMenu" aria-expanded="false"
                  aria-controls="hrmSubMenu">
                  <span class="menu-title">H R M</span>
                  <i class="mdi mdi-home menu-icon"></i>
                </a>
                <div class="collapse" id="hrmSubMenu">
                  <ul class="nav flex-column sub-menu">
                    @can('view_staff')
                      <li class="nav-item"><a class="nav-link" href="{{ url('hrm') }}">Add Staff</a></li>
                    @endcan
                  </ul>
                </div>
              </li>
            @endcanany

            {{-- Operations --}}
            @canany(['view_payroll', 'add_payroll', 'update_payroll', 'delete_payroll', 'view_training', 'add_training', 'update_training', 'delete_training', 'view_attendance', 'view_leave_type', 'view_leave_request'])
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#operSubMenu" aria-expanded="false"
                  aria-controls="operSubMenu">
                  <span class="menu-title">Operations</span>
                  <i class="mdi mdi-home menu-icon"></i>
                </a>
                <div class="collapse" id="operSubMenu">
                  <ul class="nav flex-column sub-menu">
                    @can('view_payroll')
                      <li class="nav-item"><a class="nav-link" href="{{ url('payroll') }}">Payroll</a></li>
                    @endcan

                    {{-- PayRoll Management sub-menu --}}
                    @can('view_payroll')
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#payRollSubMenu" aria-expanded="false"
                          aria-controls="payRollSubMenu">Payroll Management</a>
                        <div class="collapse" id="payRollSubMenu">
                          <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link"
                                href="{{route('dashboard.employee-payroll.salaries')}}">Set Employee Salary</a></li>
                            <li class="nav-item"><a class="nav-link"
                                href="{{route('dashboard.employee-payroll.salary-report')}}">Salary Report</a></li>
                          </ul>
                        </div>
                      </li>
                    @endcan

                    <!-- Holidays Management -->
                    @can('view_payroll')
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard.holidays.index')}}">Set Holidays</a>
                      </li>
                    @endcan

                    {{-- Attendance sub-menu --}}
                      @if(auth()->user()->role === 'Super Admin')
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="collapse" href="#attendanceSubMenu" aria-expanded="false"
                            aria-controls="attendanceSubMenu">Attendance Management</a>
                          <div class="collapse" id="attendanceSubMenu">
                            <ul class="nav flex-column sub-menu">
                              <li class="nav-item">
                                <a class="nav-link" href="{{ route('attendance.attendance_view') }}">View Attendance</a>
                              </li>
                            </ul>
                          </div>
                        </li>
                      @endif

                    {{-- Leaves sub-menu --}}
                    @canany(['view_leave_type', 'view_leave_request'])
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#employeeLeaveSubMenu" aria-expanded="false"
                          aria-controls="employeeLeaveSubMenu">Employee Leaves</a>

                        <div class="collapse" id="employeeLeaveSubMenu">
                          <ul class="nav flex-column sub-menu">

                            @can('view_leave_type')
                              <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.leave-types.index') }}">
                                  Add/View Leave Types
                                </a>
                              </li>
                            @endcan

                            @can('view_leave_request')
                              <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.employee-leaves.index') }}">
                                  Approve/Disapprove Leave Requests
                                </a>
                              </li>
                            @endcan

                          </ul>
                        </div>
                      </li>
                    @endcanany

                    @can('view_training')
                      <li class="nav-item"><a class="nav-link" href="{{ url('train') }}">Training</a></li>
                    @endcan
                  </ul>
                </div>
              </li>
            @endcanany

            {{-- Procure / Inventory --}}
            @can('view_piffersinventory')
              <li class="nav-item"><a class="nav-link" href="{{ route('purchase.dashboard') }}"
                  style="background-color: transparent;">Procure, 3-Way Match & Pay</a></li>
            @endcan

            {{-- Sales --}}
            @canany(['view_items', 'add_items', 'update_items', 'delete_items', 'view_campaigns', 'add_campaigns', 'update_campaigns', 'delete_campaigns', 'view_requirements', 'add_requirements', 'update_requirements', 'delete_requirements'])
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#salesSubMenu" aria-expanded="false"
                  aria-controls="salesSubMenu">
                  <span class="menu-title">Sales</span>
                  <i class="mdi mdi-home menu-icon"></i>
                </a>
                <div class="collapse" id="salesSubMenu">
                  <ul class="nav flex-column sub-menu">
                    @can('view_items')
                      <li class="nav-item"><a class="nav-link" href="{{ route('items') }}">Add Items</a></li>
                    @endcan
                    @can('view_campaigns')
                      <li class="nav-item"><a class="nav-link" href="{{ url('campaign') }}">Planning</a></li>
                    @endcan
                    @can('view_requirements')
                      <li class="nav-item"><a class="nav-link" href="{{ route('requirements') }}">Requirements</a></li>
                    @endcan
                  </ul>
                </div>
              </li>
            @endcanany

            {{-- System Access Rights (Only for Super Admin, not clients) --}}
            @if (
                auth()->user()->hasAnyRole('Super Admin')
              )
              @if (auth()->user()->role !== 'client')
                <li class="nav-item">
                  <a class="nav-link " href="{{route('access')}}" style="background-color: transparent;">System Access
                    Rights</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{ route('admin_reports') }}"
                    style="background-color: transparent;">Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="{{route('dashboard.lms.index')}}" style="background-color: transparent;">LMS
                    Management</a>
                </li>
              @endif
            @endif

          </ul>

        </div>
      </div>
    </nav>


    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      toastr.options = {

        "progressBar": true,
        "positionClass": "toast-top-right",
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };

      @if(Session::has('success'))
        toastr.success({!! json_encode(Session::get('success')) !!});
      @endif

      @if(Session::has('error'))
        toastr.error({!! json_encode(Session::get('error')) !!});
      @endif

      @if(Session::has('info'))
        toastr.info({!! json_encode(Session::get('info')) !!});
      @endif

      @if(Session::has('warning'))
        toastr.warning({!! json_encode(Session::get('warning')) !!});
      @endif
    </script>

    <script>
        function setupExportButtons(tableId) {
          const table = document.getElementById(tableId);
          if (!table) return;

          if (document.getElementById("export-buttons-" + tableId)) return;

          const buttonWrapper = document.createElement("div");
          buttonWrapper.className = "export-buttons mb-3";
          buttonWrapper.id = "export-buttons-" + tableId;

          buttonWrapper.innerHTML = `
                    <button class="btn me-2 float-end" onclick="exportINPDF('${tableId}')">
                        <img src="https://cdn-icons-png.flaticon.com/128/4726/4726010.png" width="30" height="30" />
                    </button>
                    <button class="btn me-2 float-end" onclick="exportInExcel('${tableId}')">
                        <img src="https://cdn-icons-png.flaticon.com/128/4726/4726040.png" width="30" height="30" />
                    </button>
                    <button class="btn float-end" onclick="exportInWord('${tableId}')">
                        <img src="https://cdn-icons-png.flaticon.com/128/4725/4725970.png" width="30" height="30" />
                    </button>
                `;

          table.parentElement.insertBefore(buttonWrapper, table);
        }

        async function exportINPDF(tableId) {
          const { jsPDF } = window.jspdf;
          const doc = new jsPDF('l', 'pt', 'a4');
          doc.autoTable({
            html: "#" + tableId,
            startY: 20,
            tableWidth: 'auto',

            styles: {
              fontSize: 8,
              overflow: 'hidden',
              cellWidth: 'auto',
              halign: 'center',
              valign: 'middle',
              minCellWidth: 40
            },

            headStyles: {
              fillColor: [0, 0, 0],
              textColor: [255, 255, 255],
              overflow: 'hidden',
              cellWidth: 'auto',
              fontSize: 9,
              minCellWidth: 60,
              halign: 'center'
            },
            pageBreak: 'avoid',
            tableWidth: 'auto'
          });
          const pageWidth = doc.internal.pageSize.getWidth() - 40;
          doc.internal.write('q 1 0 0 1 0 0 cm\n');
          doc.internal.write(`W ${pageWidth} 0 0 595 re\n`);
          doc.internal.write('n\n');
          doc.save(tableId + "_report.pdf");
        }
      function exportInExcel(tableId) {
        const table = document.getElementById(tableId);
        const wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });

        const ws = wb.Sheets["Sheet1"];

        const colWidths = [];
        for (let col = 0; col < 17; col++) {
          colWidths[col] = { wch: 30 };
        }
        ws['!cols'] = colWidths;

        for (let cell in ws) {
          if (ws.hasOwnProperty(cell) && cell[0] !== '!') {
            if (!ws[cell].s) ws[cell].s = {};

            ws[cell].s.alignment = {
              wrapText: true,
              vertical: 'center',
              horizontal: 'center'
            };

            const rowIndex = parseInt(cell.match(/\d+/)[0]) - 1;
            const row = table.rows[rowIndex];

            if (row && row.classList.contains('gm-header')) {
              ws[cell].s.fill = { fgColor: { rgb: "000000" } };
              ws[cell].s.font = { color: { rgb: "FFFFFF" }, bold: true, sz: 14 };
            }
          }
        }

        XLSX.writeFile(wb, tableId + "_report.xlsx", { cellStyles: true });
      }

      function exportInWord(tableId) {
        const table = document.getElementById(tableId);
        let html = `
                <html xmlns:o='urn:schemas-microsoft-com:office:office'
                    xmlns:w='urn:schemas-microsoft-com:office:word'
                    xmlns='http://www.w3.org/TR/REC-html40'>
                <head><meta charset='utf-8'><title>Export HTML To Word</title></head><body>`;

        html += table.outerHTML + "</body></html>";

        const blob = new Blob(['\ufeff', html], { type: 'application/msword' });
        saveAs(blob, tableId + "_report.doc");
      }
      document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll("table.exportable").forEach((table, index) => {
          if (!table.id) {
            table.id = "autoExportTable" + (index + 1);
          }
          setupExportButtons(table.id);
        });
      });
    </script>


    @include('layouts.export-utils')