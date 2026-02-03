@include('layouts.header')

@push('css')

    @include('vendors.data-tables')
    @include('vendors.toastr')
    @include('vendors.sweet-alerts')

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            --secondary-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --danger-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            --glass-bg: rgba(255, 255, 255, 0.9);
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: #f3f4f6 !important;
        }

        .premium-header {
            background: var(--primary-gradient);
            padding: 3rem 2rem;
            border-radius: 0 0 40px 40px;
            margin-bottom: -4rem;
            color: white;
        }

        .stat-card {
            background: white;
            border: none;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-label {
            color: #6b7280;
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .stat-value {
            color: #111827;
            font-size: 1.875rem;
            font-weight: 700;
        }

        .table-card {
            background: white;
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(229, 231, 235, 0.5);
        }

        #salaryFormulasTable thead th {
            background: #f9fafb;
            color: #4b5563;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            border: none;
            padding: 1.25rem 1rem;
        }

        #salaryFormulasTable tbody td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            color: #374151;
            font-size: 0.9375rem;
            border-bottom: 1px solid #f3f4f6;
        }

        #salaryFormulasTable tr:hover td {
            background-color: #f9fafb;
        }

        .dataTables_filter input {
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            padding: 0.6rem 1rem;
            width: 300px !important;
            margin-left: 1rem;
        }

        .dataTables_length select {
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            padding: 0.4rem 1rem;
        }
    </style>
@endpush

<div class="customer_form">
    @include('headerlogout')

    {{-- Premium Header Section --}}
    <div class="premium-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <h1 class="font-weight-bold mb-2">Employee Payroll System</h1>
                    <p class="opacity-75 mb-0">Configure salary structures and track growth across your workforce</p>
                </div>
                <div class="col-auto">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('/home') }}"
                                    class="text-white opacity-75">Dashboard</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Salaries</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5 mt-n4">
        {{-- Stats Overview --}}
        <div class="row mb-5">
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(79, 70, 229, 0.1); color: #4f46e5;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-label">Total Employees</div>
                    <div class="stat-value">{{ \App\Models\Hrm::count() }}</div>
                </div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-label">Active Formulas</div>
                    <div class="stat-value">{{ \App\Models\EmployeeSalaryStatus::where('status', 'active')->count() }}
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-label">Pending Setup</div>
                    <div class="stat-value">{{ \App\Models\Hrm::doesnthave('salaryStatus')->count() }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(239, 68, 68, 0.1); color: #ef4444;">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div class="stat-label">Projected Payroll</div>
                    <div class="stat-value"><small>PKR</small>
                        {{ number_format(\App\Models\EmployeeSalaryStatus::sum('before_increment'), 0) }}</div>
                </div>
            </div>
        </div>

        {{-- Table Section --}}
        <div class="table-card">
            <div class="mb-4">
                <h3 class="font-weight-bold text-gray-800 mb-1">Salary Distribution Hub</h3>
                <p class="text-muted small mb-4">List of all employees and their current financial configurations</p>
                <hr>
            </div>

            <x-table-view-employee-salary-formulas-component />
        </div>
    </div>

    <x-modal-add-employee-salary-component />
    <x-modal-employee-increment-sheet-component />
</div>

@push('js')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script src="{{ asset('js/core/employees-salaries/main.js') }}"></script>
    <script src="{{ asset('js/data-table-init.js') }}"></script>
    <script src="{{ asset('js/core/employees-salaries/table.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
@endpush

@include('layouts.footer')