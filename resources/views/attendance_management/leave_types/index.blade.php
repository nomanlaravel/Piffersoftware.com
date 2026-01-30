@include('layouts.header')

@push('css')
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
            --accent-color: #667eea;
            --text-main: #2d3748;
            --text-muted: #718096;
            --card-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .customer_form {
            margin-left: 15% !important;
            padding: 2rem !important;
            width: 85% !important;
            background-color: #f7fafc;
            min-height: 100vh;
        }

        @media screen and (max-width: 991px) {
            .customer_form {
                margin-left: 0 !important;
                width: 100% !important;
                padding: 1rem !important;
            }
        }

        /* Premium Card Header */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            background: white;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #edf2f7;
            padding: 1.5rem;
        }

        .card-title {
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.5px;
            margin-bottom: 0.25rem;
        }

        /* Custom Button Styling */
        .btn-premium {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(102, 126, 234, 0.25);
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(102, 126, 234, 0.35);
            color: white;
            filter: brightness(1.1);
        }

        /* Badge Customization */
        .badge {
            padding: 0.5em 0.8em;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.7rem;
        }

        /* Status Badges - High Visibility */
        .badge.badge-active {
            background-color: #d1fae5 !important;
            color: #065f46 !important;
            border: 1px solid #6ee7b7 !important;
            padding: 6px 14px !important;
            display: inline-block !important;
            min-width: 80px;
            text-align: center;
        }
        .badge.badge-held {
            background-color: #fee2e2 !important;
            color: #991b1b !important;
            border: 1px solid #fca5a5 !important;
            padding: 6px 14px !important;
            display: inline-block !important;
            min-width: 80px;
            text-align: center;
        }

        /* Datatable Polish */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: var(--primary-gradient) !important;
            color: white !important;
            border: none !important;
            border-radius: 8px !important;
        }

        .table thead th {
            background: #f8fafc;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            border-bottom: 2px solid #edf2f7;
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            color: var(--text-main);
            font-size: 0.9rem;
        }

        /* Action Dropdown */
        .dropdown-action .action-icon {
            color: #a0aec0;
            font-size: 1.2rem;
            transition: color 0.2s;
        }

        .dropdown-action .action-icon:hover {
            color: var(--accent-color);
        }

        /* Action Dropdown Overrides */
        .dropdown-menu-right {
            border: 1px solid #edf2f7;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
            padding: 8px !important;
            background: white !important;
            min-width: 160px;
            margin-top: 5px !important;
        }

        .dropdown-item {
            border-radius: 8px !important;
            padding: 10px 15px !important;
            font-size: 0.85rem !important;
            font-weight: 500 !important;
            background: transparent !important;
            color: #4a5568 !important;
            transition: all 0.2s ease !important;
            display: flex !important;
            align-items: center !important;
        }

        .dropdown-item:hover {
            background-color: #f7fafc !important;
            color: #667eea !important;
            transform: translateX(3px);
        }

        .dropdown-item.delete-leave-type:hover {
            background-color: #fff5f5 !important;
            color: #e53e3e !important;
        }

        .dropdown-item i {
            margin-right: 12px !important;
            font-size: 1rem !important;
            opacity: 0.7;
        }

        .dropdown-divider {
            border-top: 1px solid #edf2f7 !important;
            margin: 5px 0 !important;
        }

        /* Selection/Search Box */
        .dataTables_filter input {
            border: 1px solid #e2e8f0 !important;
            border-radius: 10px !important;
            padding: 0.4rem 1rem !important;
            outline: none !important;
        }

        .dataTables_length select {
            border: 1px solid #e2e8f0 !important;
            border-radius: 8px !important;
            padding: 0.3rem !important;
        }
    </style>
@endpush

<div class="customer_form">
    @include('headerlogout')

    <!-- Header with Action -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="bg-primary rounded-circle p-2 mr-3 d-flex align-items-center justify-content-center shadow-sm"
                    style="width: 50px; height: 50px;">
                    <i class="fas fa-calendar-alt text-white fa-lg"></i>
                </div>
                <div>
                    <h2 class="card-title mb-0" style="font-size: 1.75rem; line-height: 1.2;">Leave Management</h2>
                    <p class="text-muted small mb-0">Define and manage your organization's leave categories</p>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <button class="btn btn-premium shadow-lg px-4 py-2" data-toggle="modal" data-target="#add_leave_type">
                <i class="fas fa-plus-circle mr-2"></i> Create New Leave Type
            </button>
        </div>
    </div>

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-muted">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-muted">Operations</a></li>
            <li class="breadcrumb-item active text-primary font-weight-bold" aria-current="page">Leave Types</li>
        </ol>
    </nav>

    <x-table-leave-type-component />

    <x-modal-add-leave-type />
</div>

@push('js')
    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/core/leave-types/main.js') }}"></script>
    <script src="{{ asset('js/core/leave-types/table.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
@endpush

@include('layouts.footer')