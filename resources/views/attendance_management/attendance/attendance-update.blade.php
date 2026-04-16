@include('layouts.header')

<!-- CSS Dependencies -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        --danger-gradient: linear-gradient(135deg, #ee0979 0%, #ff6a00 100%);
        --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --info-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        --light-bg: #f8f9ff;
        --text-primary: #2d3748;
        --text-secondary: #718096;
        --border-radius-lg: 16px;
        --border-radius-md: 12px;
        --border-radius-sm: 8px;
        --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
        --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.12);
        --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.16);
        --shadow-xl: 0 12px 48px rgba(0, 0, 0, 0.2);
    }

    * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
    }

    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf4 100%);
        min-height: 100vh;
    }

    .customer_form {
        margin-left: 15% !important;
        padding: 30px !important;
        width: 85% !important;
        box-sizing: border-box;
    }

    @media screen and (max-width: 991px) {
        .customer_form {
            margin-left: 0 !important;
            width: 100% !important;
            padding: 15px !important;
        }
    }

    /* Modern Alert Styling */
    .alert-success {
        background: linear-gradient(135deg, rgba(17, 153, 142, 0.1) 0%, rgba(56, 239, 125, 0.1) 100%);
        border: 2px solid rgba(56, 239, 125, 0.3);
        border-radius: var(--border-radius-md);
        color: #0d9488;
        font-weight: 500;
        box-shadow: var(--shadow-sm);
        animation: slideDown 0.4s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Main Card Styling */
    .card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--border-radius-lg);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .card:hover {
        box-shadow: var(--shadow-xl);
        transform: translateY(-2px);
    }

    .card-header {
        background: var(--primary-gradient);
        color: white;
        padding: 24px 32px;
        border-bottom: none;
        position: relative;
        overflow: hidden;
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .card-header h2 {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
        letter-spacing: -0.5px;
        position: relative;
        z-index: 1;
    }

    .card-body {
        padding: 32px;
    }

    /* Filter Section */
    .filter-row {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        padding: 24px;
        border-radius: var(--border-radius-md);
        margin-bottom: 28px;
        border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .form-group {
        margin-bottom: 0;
    }

    .form-group label {
        color: var(--text-primary);
        font-weight: 600;
        font-size: 13px;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Select2 Styling */
    .select2-container {
        width: 100% !important;
    }

    .select2-container .select2-selection--single {
        height: 48px !important;
        border: 2px solid #e2e8f0 !important;
        border-radius: var(--border-radius-sm) !important;
        transition: all 0.3s ease !important;
        background: white !important;
    }

    .select2-container--default.select2-container--focus .select2-selection--single,
    .select2-container .select2-selection--single:focus,
    .select2-container .select2-selection--single:hover {
        border-color: #667eea !important;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1) !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 44px !important;
        color: var(--text-primary) !important;
        font-weight: 500 !important;
        padding-left: 16px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 44px !important;
        right: 8px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__placeholder {
        color: #94a3b8 !important;
    }

    /* Select2 Dropdown */
    .select2-dropdown {
        border: 2px solid #e2e8f0 !important;
        border-radius: var(--border-radius-sm) !important;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12) !important;
    }

    .select2-results__option {
        padding: 12px 16px !important;
        font-weight: 500 !important;
    }

    .select2-results__option--highlighted {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%) !important;
        color: #667eea !important;
    }

    /* Validation Error Styling */
    .error {
        display: block;
        color: #ef4444;
        font-size: 13px;
        font-weight: 600;
        margin-top: 6px;
        padding: 8px 12px;
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.1) 100%);
        border-radius: 6px;
        border-left: 3px solid #ef4444;
        animation: errorShake 0.4s ease-in-out;
    }

    @keyframes errorShake {

        0%,
        100% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-5px);
        }

        75% {
            transform: translateX(5px);
        }
    }

    .select2-container--default.error .select2-selection--single,
    .form-control.error,
    .select.error {
        border-color: #ef4444 !important;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
    }

    /* Search Button */
    .btn-success {
        background: var(--success-gradient) !important;
        border: none !important;
        height: 48px;
        border-radius: var(--border-radius-sm);
        font-weight: 600;
        font-size: 15px;
        letter-spacing: 0.3px;
        text-transform: uppercase;
        box-shadow: 0 4px 12px rgba(17, 153, 142, 0.3);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-success::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .btn-success:hover::before {
        left: 100%;
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(17, 153, 142, 0.4);
    }

    .btn-success:active {
        transform: translateY(0);
    }

    /* Export Buttons */
    .dt-buttons {
        margin-bottom: 20px;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        align-items: center;
    }

    .dt-buttons .btn {
        border-radius: 10px !important;
        font-weight: 600 !important;
        padding: 12px 24px !important;
        border: none !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
        transition: all 0.3s ease !important;
        text-transform: uppercase !important;
        font-size: 13px !important;
        letter-spacing: 0.5px !important;
        color: white !important;
        position: relative;
        overflow: hidden;
    }

    .dt-buttons .btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .dt-buttons .btn:hover::before {
        left: 100%;
    }

    .dt-buttons .btn-danger {
        background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%) !important;
    }

    .dt-buttons .btn-secondary {
        background: linear-gradient(135deg, #374151 0%, #4b5563 100%) !important;
    }

    .dt-buttons .btn-info {
        background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 100%) !important;
    }

    .dt-buttons .btn:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25) !important;
    }

    /* DataTables Search Box */
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 20px;
    }

    .dataTables_wrapper .dataTables_filter input {
        border: 2px solid #e2e8f0 !important;
        border-radius: 10px !important;
        padding: 10px 16px !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        color: #2d3748 !important;
        transition: all 0.3s ease !important;
        margin-left: 8px !important;
        width: 250px !important;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        outline: none !important;
        border-color: #667eea !important;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1) !important;
    }

    .dataTables_wrapper .dataTables_filter label {
        font-weight: 600 !important;
        color: #2d3748 !important;
        font-size: 14px !important;
    }

    /* Table Styling */
    .table-responsive {
        border-radius: var(--border-radius-md);
        overflow-x: auto !important;
        overflow-y: visible;
        box-shadow: var(--shadow-sm);
        margin-top: 24px;
        max-width: 100%;
        -webkit-overflow-scrolling: touch;
    }

    .custom-table {
        margin-bottom: 0 !important;
        border-collapse: separate;
        border-spacing: 0;
        min-width: 100%;
        width: max-content;
    }

    .custom-table thead th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white !important;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding: 16px 12px;
        border: none;
        white-space: nowrap;
        text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    }

    .custom-table tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        border-bottom: 1px solid #e2e8f0;
        color: var(--text-primary);
        font-size: 14px;
        transition: background-color 0.2s ease;
    }

    .custom-table tbody td:first-child {
        font-weight: 600;
        padding-left: 16px;
    }

    .custom-table tbody tr {
        transition: all 0.2s ease;
    }

    .custom-table tbody tr:hover {
        background-color: rgba(102, 126, 234, 0.04);
    }

    .custom-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Attendance Icons */
    .custom-table td a {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        transition: all 0.3s ease;
        position: relative;
    }

    .custom-table td a i {
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .custom-table td a i.fa-check {
        color: #10b981;
    }

    .custom-table td a i.fa-times {
        color: #ef4444;
    }

    .custom-table td a i.fa-star {
        color: #f59e0b;
    }

    .custom-table td a:hover {
        background: rgba(102, 126, 234, 0.1);
        transform: scale(1.15) rotate(5deg);
    }

    .custom-table td a:hover i {
        transform: scale(1.2);
    }

    /* Holiday Highlighting */
    .holiday-bg {
        background: linear-gradient(135deg, rgba(251, 191, 36, 0.15) 0%, rgba(252, 211, 77, 0.15) 100%) !important;
        position: relative;
    }

    .holiday-bg::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #f59e0b, #fbbf24);
    }

    .holiday-icon {
        color: #d97706 !important;
        font-size: 16px;
        filter: drop-shadow(0 2px 4px rgba(217, 119, 6, 0.3));
    }

    .holiday-present {
        color: #10b981 !important;
        position: relative;
    }

    .holiday-present::after {
        content: '\f005';
        font-family: FontAwesome;
        font-size: 10px;
        position: absolute;
        top: -6px;
        right: -6px;
        color: #f59e0b;
        background: white;
        border-radius: 50%;
        padding: 2px;
        filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.2));
    }

    /* Statistics Badge Styling */
    .custom-table tbody td:nth-child(3) {
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        color: #2d3748;
        font-weight: 600;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.08) 0%, rgba(118, 75, 162, 0.08) 100%) !important;
        border-left: 4px solid #667eea;
        padding: 12px 14px !important;
        line-height: 1.5;
        min-width: 240px;
        white-space: nowrap;
    }

    .custom-table thead th:nth-child(3){
        min-width: 240px;
        white-space: nowrap;
        text-align: center;
    }
    .custom-table thead th:nth-child(2), th:nth-child(1) {
        min-width: 150px;
        white-space: nowrap;
        text-align: center;
    }

    /* Pagination */
    .pagination {
        margin-top: 24px;
    }

    .page-link {
        border: 2px solid #e2e8f0;
        color: #667eea;
        font-weight: 600;
        margin: 0 4px;
        border-radius: var(--border-radius-sm);
        transition: all 0.3s ease;
        padding: 8px 16px;
    }

    .page-link:hover {
        background: var(--primary-gradient);
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
    }

    .page-item.active .page-link {
        background: var(--primary-gradient);
        border-color: transparent;
        box-shadow: var(--shadow-md);
    }

    /* Tooltips */
    .tooltip-inner {
        background: var(--dark-gradient);
        border-radius: var(--border-radius-sm);
        padding: 8px 16px;
        font-weight: 500;
        box-shadow: var(--shadow-md);
    }

    /* Loading Animation */
    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }
    }

    .loading {
        animation: pulse 1.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    /* Statistics & Report Styles */
    .stats-container {
        display: flex;
        flex-direction: column;
        gap: 6px;
        min-width: 120px;
    }

    .stat-item {
        font-size: 11px;
        color: #64748b;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 4px;
        white-space: nowrap;
    }

    .stat-counts {
        display: flex;
        gap: 4px;
        flex-wrap: nowrap;
        margin-top: 2px;
    }

    .stat-counts .badge {
        font-size: 10px;
        padding: 2px 6px;
        font-weight: 800;
        border-radius: 4px;
        min-width: 32px;
        text-align: center;
    }

    .badge-success-light {
        background: #ecfdf5;
        color: #059669;
        border-color: #10b981;
    }

    .badge-warning-light {
        background: #fffbeb;
        color: #d97706;
        border-color: #f59e0b;
    }

    .badge-danger-light {
        background: #fef2f2;
        color: #dc2626;
        border-color: #ef4444;
    }

    .leave-report-section {
        background: #ffffff;
        border-radius: var(--border-radius-md);
        padding: 10px;
    }

    .leave-summary-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #e2e8f0;
        border-radius: var(--border-radius-sm);
        overflow: hidden;
    }

    .leave-summary-table thead th {
        background: #f8fafc !important;
        color: #64748b !important;
        font-size: 11px;
        text-transform: uppercase;
        padding: 12px;
        border-bottom: 2px solid #e2e8f0;
    }

    .leave-summary-table td {
        padding: 12px;
        font-size: 13px;
        border-bottom: 1px solid #f1f5f9;
        font-weight: 500;
        color: #1e293b;
    }

    .leave-count-badge {
        padding: 4px 10px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 700;
    }

    .count-used {
        background: #fef2f2;
        color: #dc2626;
    }

    .count-remaining {
        background: #ecfdf5;
        color: #059669;
    }

    .view-leave-summary {
        font-weight: 600;
        padding: 6px 12px;
        border-radius: var(--border-radius-sm);
        transition: all 0.2s;
        white-space: nowrap;
    }

    .view-leave-summary:hover {
        color: white;
        transform: translateY(-1px);
        box-shadow: var(--shadow-sm);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-header h2 {
            font-size: 22px;
        }

        .card-body {
            padding: 20px;
        }

        .filter-row {
            padding: 16px;
        }

        .custom-table thead th,
        .custom-table tbody td {
            font-size: 12px;
            padding: 10px 8px;
        }
    }

    /* Smooth Scrollbar */
    .table-responsive::-webkit-scrollbar {
        height: 10px;
    }

    .table-responsive::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        border: 2px solid #f1f5f9;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
    }

    /* Scroll Indicator */
    .table-responsive {
        position: relative;
    }

    .table-responsive::after {
        content: '← Scroll to view more →';
        position: sticky;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
        color: white;
        padding: 8px 16px;
        font-size: 12px;
        font-weight: 600;
        border-radius: 8px 0 0 0;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.3s ease;
        float: right;
        margin-top: -10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .table-responsive:hover::after {
        opacity: 1;
    }

    /* DataTables Pagination Styling */
    .dataTables_wrapper .dataTables_paginate {
        margin-top: 24px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        border: 2px solid #e2e8f0 !important;
        color: #667eea !important;
        font-weight: 600 !important;
        margin: 0 4px !important;
        border-radius: 8px !important;
        transition: all 0.3s ease !important;
        padding: 8px 16px !important;
        background: white !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: var(--primary-gradient) !important;
        color: white !important;
        border-color: transparent !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3) !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: var(--primary-gradient) !important;
        border-color: transparent !important;
        color: white !important;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4) !important;
    }

    .dataTables_wrapper .dataTables_info {
        font-weight: 600;
        color: #64748b;
        font-size: 14px;
        padding-top: 12px;
    }




    /* Mobile Improvements */
    @media (max-width: 768px) {
        .table-responsive::after {
            content: '← Swipe →';
            font-size: 11px;
            padding: 6px 12px;
        }

        .dt-buttons {
            justify-content: center;
        }

        .dataTables_wrapper .dataTables_filter input {
            width: 180px !important;
        }
    }
</style>

<div class="customer_form">
    @include('headerlogout')
    <x-bread-crumb-component :modal=false />

    @if (\Session::has('message') || isset($message))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check" aria-hidden="true"></i><strong class="ml-2">{{ \Session::get('message') }}
                {{ $message ?? 'Done' }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2>Attendance Details</h2>
        </div>
        <div class="card-body">
            <form class="mb-4" id="adminEmployeeAttendance" method="GET" novalidate>
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <select class="select select2 floating" name="employee_id" required>
                                <option value="">Employee</option>
                                @forelse ($employeesT as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @empty
                                    <option value="">No employee found.</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <select class="select select2 floating" name="month" required>
                                <option value="">Month</option>
                                <option>Jan</option>
                                <option>Feb</option>
                                <option>Mar</option>
                                <option>Apr</option>
                                <option>May</option>
                                <option>Jun</option>
                                <option>Jul</option>
                                <option>Aug</option>
                                <option>Sep</option>
                                <option>Oct</option>
                                <option>Nov</option>
                                <option>Dec</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <select class="select select2 floating" name="year" required>
                                <option value="">Year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button type="submit" class="btn btn-success btn-block"> Search </button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Annual Report</th>
                                    <th>Statistics</th>
                                    @foreach ($monthDays as $item)
                                        <th class="{{ $holiDayData->has($item) ? 'holiday-bg' : '' }} text-center">
                                            s {{ \Carbon\Carbon::parse($item)->format('d') }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $employee)
                                    <tr>
                                        <td>
                                            {{ $employee->name }} {{ $employee->id }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary-gradient view-leave-summary"
                                                data-emp-id="{{ $employee->id }}" data-emp-name="{{ $employee->name }}"
                                                data-year="{{ $year ?? date('Y') }}" data-toggle="modal"
                                                data-target="#leave_summary_modal">
                                                <i class="fa fa-bar-chart mr-1"></i> Report
                                            </button>
                                        </td>
                                        <td>
                                            <div class="stats-container">
                                                <div class="d-flex gap-2">
                                                    <span class="stat-item"><i class="fa fa-calendar-o"></i>
                                                        TD:{{ count($monthDays) }}</span> |
                                                    <span class="stat-item"><i class="fa fa-briefcase"></i>
                                                        WD:{{ $workingDays }}</span>
                                                </div>
                                                <div class="stat-counts">
                                                    <span class="badge badge-success-light"
                                                        title="Present">P:{{ $employee->present_count }}</span>
                                                    <span class="badge badge-warning-light"
                                                        title="Leave">L:{{ $employee->leave_count }}</span>
                                                    <span class="badge badge-danger-light"
                                                        title="Absent">A:{{ $employee->absent_count }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        @foreach ($monthDays as $attendance => $val)
                                            @php
                                                $dayAttendance = $employee->attendances->firstWhere('date', $val);
                                                $isHoliday = $holiDayData->has($val);
                                                $holidayInfo = $isHoliday ? $holiDayData->get($val) : null;
                                            @endphp
                                            @if ($dayAttendance)
                                                <td class="{{ $isHoliday ? 'holiday-bg' : '' }}">
                                                    <a href="javascript:void(0);" class="view-attendance-details"
                                                        data-att-date="{{ $val }}" data-emp-id="{{ $employee->id }}"
                                                        data-emp-name="{{ $employee->name }}" data-toggle="modal"
                                                        data-target="#attendance_info_in">
                                                        <i class="fa fa-check {{ $isHoliday ? 'holiday-present' : 'text-success' }}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{ $employee->name . ' ' . $val }} {{ $isHoliday ? '(Holiday Work)' : '' }}"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td class="{{ $isHoliday ? 'holiday-bg' : '' }}">
                                                    @if($isHoliday)
                                                        <a href="javascript:void(0);" class="view-holiday-details"
                                                            data-date="{{ $val }}" data-title="{{$holidayInfo->title}}"
                                                            data-type="{{$holidayInfo->type}}" data-is_paid="{{$holidayInfo->is_paid}}"
                                                            data-toggle="modal" data-target="#holiday_info_modal">
                                                            <i class="fa fa-star holiday-icon" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Holiday: {{ $holidayInfo->title ?? $val }}"></i>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);" class="view-attendance-details"
                                                            data-att-date="{{ $val }}" data-emp-id="{{ $employee->id }}"
                                                            data-emp-name="{{ $employee->name }}" data-status="absent"
                                                            data-toggle="modal" data-target="#attendance_info_in">
                                                            <i class="fa fa-times text-danger" data-toggle="tooltip"
                                                                data-placement="top" title="{{ $employee->name . ' ' . $val }}"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $result->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>
    </div>


    <x-admin.modals.employee-attendance-update-modal :leave-types="$leaveTypes" />

    <!-- Holiday Info Modal -->
    <div id="holiday_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Holiday Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <i class="fa fa-calendar-check-o text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="holiday-title mb-1">---</h4>
                    <p class="text-muted holiday-date">---</p>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <p class="mb-0 text-muted">Type</p>
                            <h5 class="holiday-type">---</h5>
                        </div>
                        <div class="col-6">
                            <p class="mb-0 text-muted">Is_paid</p>
                            <h5 class="holiday-paid">---</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- JS Dependencies -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Helper Functions
    // Helper Functions using Fetch for better compatibility
    async function dynamicAjax(url, method, data, callback) {
        try {
            const response = await fetch(url, {
                method: method,
                body: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            });
            const result = await response.json();
            if (typeof window[callback] === "function") {
                window[callback](result);
            }
        } catch (error) {
            console.error('Fetch Error:', error);
            makeToastr('error', 'Something went wrong', 'Error');
        }
    }

    function makeToastr(type, message, title) {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
        };
        toastr[type](message, title);
    }

    $(function () {
        $('.select2').select2({
            placeholder: "Select an option",
            allowClear: true
        });

        $(".custom-table").DataTable({
            dom: "Bfrtip",
            scrollX: true,
            scrollCollapse: true,
            responsive: false,
            autoWidth: false,
            pageLength: 25,
            columnDefs: [
                { width: "280px", targets: 2 }  // Statistics column minimum width
            ],
            buttons: [{
                extend: "excelHtml5",
                text: '<i class="fa fa-file-excel-o mr-2"></i>Excel',
                title: 'Attendance Report',
                className: "btn btn-danger",
                exportOptions: {
                    orthogonal: "myExport",
                    columns: [0, 1, 2]
                },
            },
            {
                extend: "csvHtml5",
                text: '<i class="fa fa-file-text-o mr-2"></i>CSV',
                title: 'Attendance Report',
                className: "btn btn-secondary",
                exportOptions: {
                    columns: [0, 1, 2]
                },
            },
            {
                extend: "pdfHtml5",
                text: '<i class="fa fa-file-pdf-o mr-2"></i>PDF',
                title: 'Attendance Report',
                className: "btn btn-info",
                orientation: 'landscape',
                pageSize: 'A4',
                exportOptions: {
                    columns: [0, 1, 2]
                },
            },
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search employees..."
            }
        });
    });


    function toggleAttendanceFields(status) {
        if (!status) {
            status = $('input[name="attendance_status"]:checked').val();
        }

        const modal = $("#attendance_info_in");

        if (status === 'present') {
            modal.find('.present-content').show();
            modal.find('.leave-content').hide();
            modal.find('.absent-content').hide();
            modal.find('.punch-btn-section').show();

            modal.find('input[name="punch_in_time"]').prop('disabled', false);
            modal.find('input[name="punch_out_time"]').prop('disabled', false);
            modal.find('select[name="leave_type_id"]').prop('disabled', true);
            modal.find('textarea[name="remarks"]').prop('disabled', true);
        } else if (status === 'leave') {
            modal.find('.present-content').hide();
            modal.find('.leave-content').show();
            modal.find('.absent-content').hide();
            modal.find('.punch-btn-section').show();

            modal.find('input[name="punch_in_time"]').prop('disabled', true);
            modal.find('input[name="punch_out_time"]').prop('disabled', true);
            modal.find('.leave-content').find('select[name="leave_type_id"]').prop('disabled', false);
            modal.find('.leave-content').find('textarea[name="remarks"]').prop('disabled', false);
            modal.find('.absent-content').find('textarea[name="remarks"]').prop('disabled', true);
        } else if (status === 'absent') {
            modal.find('.present-content').hide();
            modal.find('.leave-content').hide();
            modal.find('.absent-content').show();
            modal.find('.punch-btn-section').show();

            modal.find('input[name="punch_in_time"]').prop('disabled', true);
            modal.find('input[name="punch_out_time"]').prop('disabled', true);
            modal.find('select[name="leave_type_id"]').prop('disabled', true);
            modal.find('.absent-content').find('textarea[name="remarks"]').prop('disabled', false);
            modal.find('.leave-content').find('textarea[name="remarks"]').prop('disabled', true);
        } else {
            modal.find('.present-content').hide();
            modal.find('.leave-content').hide();
            modal.find('.absent-content').hide();
            modal.find('.punch-btn-section').hide();
            modal.find('.financial-adjustment-section').hide();
        }

        if (status) {
            modal.find('.financial-adjustment-section').show();
        }
    }

    function timeDiffCalc(dateFuture, dateNow) {
        let diffInMilliSeconds = Math.abs(dateFuture - dateNow) / 1000;

        // calculate days
        const days = Math.floor(diffInMilliSeconds / 86400);
        diffInMilliSeconds -= days * 86400;
        console.log('calculated days', days);

        // calculate hours
        const hours = Math.floor(diffInMilliSeconds / 3600) % 24;
        diffInMilliSeconds -= hours * 3600;
        console.log('calculated hours', hours);

        // calculate minutes
        const minutes = Math.floor(diffInMilliSeconds / 60) % 60;
        diffInMilliSeconds -= minutes * 60;
        console.log('minutes', minutes);

        let difference = '';
        if (days > 0) {
            difference += (days === 1) ? `${days} day, ` : `${days} days, `;
        }

        difference += (hours === 0 || hours === 1) ? `${hours} : ` : `${hours} : `;

        difference += (minutes === 0 || hours === 1) ? `${minutes} hrs` : `${minutes} hrs`;

        return difference;
    }

    $(document).on("click", ".view-attendance-details", function (e) {
        var $this = $(this);
        var modal = $("#attendance_info_in");

        // Reset views
        modal.find(".li-html").html('');
        modal.find(".punch-in-time").html('NA');
        modal.find(".punch-out-time").html('NA');
        modal.find(".working-hours").html('0:00 hrs');

        // Clear previous inputs
        modal.find('input[type="time"]').val('');
        modal.find('select').val('');
        modal.find('textarea').val('');

        var employeeId = $this.attr('data-emp-id') || $this.data('emp-id');
        var date = $this.attr('data-att-date') || $this.data('att-date');
        var name = $this.attr('data-emp-name') || $this.data('emp-name');

        console.log("Attendance Modal Open - Date:", date, "Employee:", employeeId);

        // Reset radio selection - Force Choice Flow
        modal.find('input[name="attendance_status"]').prop('checked', false);
        modal.find('.btn-group-toggle label').removeClass('active');
        toggleAttendanceFields(''); // Hide content areas initially

        $("#att_date_in").val(date);
        $("#att_user_in").val(employeeId);
        modal.find(".att-info").html('Attendance Info of ' + name + ' <small class="text-muted">(' + date + ')</small>');
        modal.find(".day").text(date);

        var formData = new FormData();
        formData.append('id', employeeId);
        formData.append('date', date);

        // Reset Status Badge
        modal.find('.current-status-text').text("Checking...").removeClass('badge-success badge-danger').addClass('badge-light');

        dynamicAjax('{{ route('api.employee.attendance.get-attendance') }}', "POST", formData,
            'attendanceReceived');
    });

    function attendanceReceived(data) {
        console.log("Attendance Data Received:", data);
        var modal = $("#attendance_info_in");
        var statusBadge = modal.find('.current-status-text');

        if (data.status) {
            // Update Status Badge
            let statusText = data.status.charAt(0).toUpperCase() + data.status.slice(1);
            statusBadge.text("Current Status: " + statusText);
            statusBadge.removeClass('badge-light badge-success badge-danger badge-warning');

            if (data.status === 'present') {
                statusBadge.addClass('badge-success');
            } else if (data.status === 'leave') {
                statusBadge.addClass('badge-warning');
            } else {
                statusBadge.addClass('badge-danger');
            }

            // Set radio button status
            let statusToSelect = data.status;
            let radioBtn = modal.find('input[name="attendance_status"][value="' + statusToSelect + '"]');

            radioBtn.prop('checked', true);
            modal.find('.btn-group-toggle label').removeClass('active');
            radioBtn.parent().addClass('active');

            // Show corresponding content fields
            toggleAttendanceFields(statusToSelect);

            // Pre-fill inputs
            if (statusToSelect === 'present') {
                if (data.check_in) modal.find('input[name="punch_in_time"]').val(data.check_in.substring(0, 5));
                if (data.check_out) modal.find('input[name="punch_out_time"]').val(data.check_out.substring(0, 5));
            } else if (statusToSelect === 'leave') {
                modal.find('.leave-content').find('textarea[name="remarks"]').val(data.notes);
                if (data.leave_type_id) {
                    modal.find('select[name="leave_type_id"]').val(data.leave_type_id);
                }
            } else if (statusToSelect === 'absent') {
                modal.find('.absent-content').find('textarea[name="remarks"]').val(data.notes);
            }

            // Populate custom salary if exists
            if (data.custom_daily_salary) {
                modal.find('input[name="custom_daily_salary"]').val(data.custom_daily_salary);
            }
        } else {
            statusBadge.text("New Record").addClass('badge-light').removeClass('badge-success badge-danger badge-warning');
        }

        // Process Activity / Punches
        let punches = data.punches || [];
        if (punches.length > 0) {
            modal.find(".li-html").html(''); // Clear the list first

            let punchIn = punches[0].attendance;
            let punchOut = punches[punches.length - 1].attendance;
            modal.find(".working-hours").html(timeDiffCalc(new Date(punchOut), new Date(punchIn)));
            modal.find(".punch-in-time").html(punches[0].time);
            modal.find(".punch-out-time").html(punches[punches.length - 1].time);

            punches.forEach(element => {
                modal.find(".li-html").append(
                    '<li><p class="mb-0">Punch at</p><p class="res-activity-time d-inline-block">' +
                    '<i class="fa fa-clock-o mr-2"></i>' + element.time +
                    '</p><i data-punchid="' + element.id +
                    '" class="fa fa-trash bx-tada delete-punch"></i></li>'
                );
            });
        } else {
            modal.find(".li-html").html('<li class="no-activity"><i class="fa fa-info-circle mr-2"></i>No activity recorded</li>');
        }
    }

    $(document).on("submit", ".employeeAttendanceUpdateForm", async function (e) {
        e.preventDefault();
        var form = $(this);
        if (form.valid()) {
            makeToastr("info", "Please wait for response...", "Request sent");

            try {
                const formData = new FormData(this);
                const response = await fetch(form.attr('action'), {
                    method: form.attr('method'),
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok) {
                    makeToastr("success", result.message || "Attendance updated", "Success");
                    setTimeout(() => location.reload(), 1500);
                } else {
                    makeToastr("error", result.message || "Action failed", "Error");
                }
            } catch (error) {
                console.error('Submit Error:', error);
                makeToastr("error", "Network or server error", "Error");
            }
        };
    });

    $("#adminEmployeeAttendance").submit(function (e) {
        e.preventDefault();
        if ($(this).valid()) {
            $(this).find("button").prop('disabled', true);
            this.submit()
        };
    });

    $("body").on("click", ".delete-punch", function (e) {
        e.preventDefault();
        let punchId = $(this).data('punchid');
        Swal.fire({
            title: "Are you sure to delete ?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-outline-danger ms-1",
            },
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                let formData = new FormData();
                formData.append('id', punchId);
                dynamicAjax('{{ route('dashboard.delete-punch') }}', "POST", formData,
                    'ddCallBack')
            }
        });
    });

    function ddCallBack(response) {
        if (response.message == 'success') {
            makeToastr("success", response.response, "Success messsage 😒");
            location.reload();
        } else {
            $(".eror").html(response.responseJSON.response);
        }
    }

    $("body").on("click", ".view-holiday-details", async function (e) {
        let date = $(this).data('date');
        let title = $(this).data('title');
        let type = $(this).data('type');
        let is_paid = $(this).data('is_paid');
        let modal = $('#holiday_info_modal');

        // Reset to loading state
        modal.find('.holiday-title').text(title);
        modal.find('.holiday-date').text(date);
        modal.find('.holiday-type').text(type);
        modal.find('.holiday-paid').text(is_paid ? 'YES' : 'NO');

        try {
            const response = await fetch(`{{ route('dashboard.holidays.get-detail') }}?date=${date}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (result.success) {
                modal.find('.holiday-title').text(result.data.title);
                modal.find('.holiday-date').text(result.data.date);
                modal.find('.holiday-type').text(result.data.type.charAt(0).toUpperCase() + result.data.type.slice(1));
                modal.find('.holiday-paid').text(result.data.is_paid + ' Holiday');
            } else {
                modal.find('.holiday-title').text('Error: ' + (result.message || 'Unknown error'));
            }
        } catch (error) {
            console.error('Holiday Fetch Error:', error);
            modal.find('.holiday-title').text('Server Error');
        }
    });

    $(document).on("click", ".view-leave-summary", function (e) {
        var $this = $(this);
        var modal = $("#leave_summary_modal");
        var employeeId = $this.data('emp-id');
        var name = $this.data('emp-name');
        var year = $this.data('year');

        modal.find(".modal-title").html('Annual Leave Summary - ' + name);
        modal.find(".current-year-text").text(year);
        modal.find(".leave-summary-body").html('<tr><td colspan="4" class="text-center text-muted"><i class="fa fa-spinner fa-spin mr-2"></i>Loading summary...</td></tr>');

        var formData = new FormData();
        formData.append('employee_id', employeeId);
        formData.append('year', year);

        dynamicAjax('{{ route('api.employee.attendance.get-leave-summary') }}', "POST", formData,
            'fillLeaveSummary');
    });

    function fillLeaveSummary(data) {
        var modal = $("#leave_summary_modal");
        if (data.leave_summary && data.leave_summary.length > 0) {
            let summaryHtml = '';
            data.leave_summary.forEach(item => {
                summaryHtml += `
                    <tr>
                        <td class="font-weight-600">${item.name}</td>
                        <td class="text-center">${item.allowed}</td>
                        <td class="text-center"><span class="leave-count-badge count-used">${item.used}</span></td>
                        <td class="text-center"><span class="leave-count-badge count-remaining">${item.remaining}</span></td>
                    </tr>
                `;
            });
            modal.find('.leave-summary-body').html(summaryHtml);
        } else {
            modal.find('.leave-summary-body').html('<tr><td colspan="4" class="text-center text-muted">No leave data found for this year.</td></tr>');
        }
    }
</script>

<!-- Leave Summary Modal -->
<div class="modal custom-modal fade" id="leave_summary_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modern-modal">
            <div class="modal-header gradient-header">
                <div class="header-content">
                    <h5 class="modal-title">Annual Leave Summary</h5>
                    <p class="modal-subtitle mb-0">Yearly leave allocation and usage</p>
                </div>
                <button type="button" class="close-btn" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="modal-body modern-modal-body">
                <div class="leave-report-section">
                    <h6 class="section-title mb-3">
                        <i class="fa fa-pie-chart mr-2"></i>Report for Year <span class="current-year-text"></span>
                    </h6>
                    <div class="table-responsive">
                        <table class="table leave-summary-table">
                            <thead>
                                <tr class="bg-light">
                                    <th>Leave Type</th>
                                    <th class="text-center">Allowed</th>
                                    <th class="text-center">Used</th>
                                    <th class="text-center">Remaining</th>
                                </tr>
                            </thead>
                            <tbody class="leave-summary-body">
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Loading...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="button" class="btn-modern btn-primary-gradient" data-dismiss="modal"
                        data-bs-dismiss="modal">
                        Close Report
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')