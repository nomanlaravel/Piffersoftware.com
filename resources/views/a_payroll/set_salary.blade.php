@include('layouts.header')

{{-- External CSS Vendors --}}
@include('vendors.data-tables')
@include('vendors.toastr')
@include('vendors.sweet-alerts')

{{-- Shared Attendance Module Styles --}}
@include('attendance_management.shared.styles')

<style>
    .stat-card {
        background: white;
        border: none;
        border-radius: 20px;
        padding: 1.5rem;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
        height: 100%;
        border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--shadow-lg);
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
        box-shadow: var(--shadow-sm);
    }

    .stat-label {
        color: var(--text-secondary);
        font-size: 0.875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.025em;
    }

    .stat-value {
        color: var(--text-primary);
        font-size: 1.875rem;
        font-weight: 800;
        margin-top: 0.25rem;
    }

    /* Custom Table Card Adjustments */
    .table-card {
        margin-top: 2rem;
    }

    .table-card-header {
        background: white !important;
        border-bottom: 1px solid #f1f5f9 !important;
    }

    /* DataTables Controls Refinement */
    .dataTables_wrapper .row:first-child {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        padding: 1rem 1.5rem !important;
        /* py-3 px-3 equivalent */
        margin: 0 !important;
        border-bottom: 1px solid #f1f5f9;
        background: #fcfdfe;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 0 !important;
        padding: 0 !important;
        width: auto !important;
    }

    .dataTables_wrapper .dataTables_filter label {
        margin-bottom: 0 !important;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .dataTables_wrapper .dataTables_length label {
        margin-bottom: 0 !important;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Fix for column layout issues in flex container */
    .dataTables_wrapper .row:first-child>div {
        flex: 0 0 auto;
        width: auto;
    }
</style>


<div class="customer_form">
    @include('headerlogout')

    {{-- Breadcrumb Component --}}
    <x-bread-crumb-component :modal="false" :showClock="'false'" />

    {{-- Stats Overview --}}
    <div class="container-fluid mb-5">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(102, 126, 234, 0.1); color: #667eea;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-label">Total Employees</div>
                    <div class="stat-value">{{ \App\Models\Hrm::count() }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(17, 153, 142, 0.1); color: #11998e;">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-label">Active Formulas</div>
                    <div class="stat-value">{{ \App\Models\EmployeeSalaryStatus::where('status', 'active')->count() }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(240, 147, 251, 0.1); color: #f093fb;">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-label">Pending Setup</div>
                    <div class="stat-value">{{ \App\Models\Hrm::doesnthave('salaryStatus')->count() }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background: rgba(238, 9, 121, 0.1); color: #ee0979;">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div class="stat-label">Projected Payroll</div>
                    <div class="stat-value">
                        <small style="font-size: 0.6em; opacity: 0.7; font-weight: 600; margin-right: 2px;">PKR</small>
                        {{ number_format(\App\Models\EmployeeSalaryStatus::sum('before_increment'), 0) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Section --}}
    <div class="card table-card border-0">
        <div class="card-header bg-white border-bottom-0 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-1">
                        <i class="fas fa-layer-group text-primary me-2"></i>Salary Distribution Hub
                    </h5>
                    <p class="text-muted small mb-0 ms-4 ps-1">List of all employees and their current financial
                        configurations</p>
                </div>
                <div>
                    <button class="btn btn-refresh" onclick="if(window.esfTable) window.esfTable.ajax.reload()">
                        <i class="fas fa-sync-alt me-2"></i>Refresh
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pt-0">
            <x-table-view-employee-salary-formulas-component />
        </div>
    </div>

    <x-modal-add-employee-salary-component />
    <x-modal-employee-increment-sheet-component />
</div>

@push('js')
    {{-- Shared Scripts --}}
    @include('attendance_management.shared.scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Specific Module Scripts --}}
    <script src="{{ asset('js/core/employees-salaries/main.js') }}"></script>
    <script src="{{ asset('js/data-table-init.js') }}"></script>
    <script src="{{ asset('js/core/employees-salaries/table.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
@endpush

@include('layouts.footer')