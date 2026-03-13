@include('layouts.header')

{{-- External CSS Vendors --}}
@include('vendors.data-tables')
@include('vendors.toastr')
@include('vendors.sweet-alerts')

{{-- Shared Attendance Module Styles --}}
@include('attendance_management.shared.styles')

<style>
    .filter-card {
        background: white;
        border-radius: var(--border-radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow-md);
        margin-bottom: 2rem;
        border: 1px solid rgba(102, 126, 234, 0.1);
    }

    .form-control-premium {
        border-radius: 12px;
        border: 1px solid #e2e8f0;
        padding: 0.75rem 1rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .form-control-premium:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .btn-generate {
        background: var(--primary-gradient);
        color: white;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: var(--shadow-md);
        transition: all 0.3s ease;
    }

    .btn-generate:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        color: white;
    }

    /* Custom Table Card Adjustments */
    .table-card {
        margin-top: 2rem;
    }

    /* DataTables Controls Refinement */
    .dataTables_wrapper .row:first-child {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        padding: 1rem 1.5rem !important;
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

    .dataTables_wrapper .dataTables_filter label,
    .dataTables_wrapper .dataTables_length label {
        margin-bottom: 0 !important;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    /* Fix for horizontal scroll with many columns */
    .table-responsive {
        border-radius: 0 0 var(--border-radius-lg) var(--border-radius-lg);
    }

    #salaryReportTable thead th {
        white-space: nowrap;
    }
</style>

<div class="customer_form">
    @include('headerlogout')

    {{-- Breadcrumb Component --}}
    <x-bread-crumb-component :modal="false" :showClock="'false'" />

    <div class="container-fluid py-4">
        {{-- Filters Section --}}
        <div class="filter-card">
            <div class="d-flex align-items-center mb-4">
                <div class="flex-shrink-0 bg-primary-light p-3 rounded-3 me-3"
                    style="background: rgba(102, 126, 234, 0.1); color: #667eea;">
                    <i class="fas fa-filter fs-4"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-0">Report Filters</h5>
                    <p class="text-muted small mb-0">Select period to generate the monthly payroll breakdown</p>
                </div>
            </div>

            <form id="filterForm" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-bold text-dark small text-uppercase">Select Month</label>
                    <select name="month" class="form-select form-control-premium">
                        @foreach($months as $num => $name)
                            <option value="{{ $num }}" {{ $num == date('n') ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label fw-bold text-dark small text-uppercase">Select Year</label>
                    <select name="year" class="form-select form-control-premium">
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-generate w-100">
                        <i class="fas fa-file-invoice-dollar me-2"></i> Generate Report
                    </button>
                </div>
            </form>
        </div>

        {{-- Report Table Section --}}
        <div class="card table-card border-0">
            <div class="card-header bg-white border-bottom-0 py-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title fw-bold mb-1">
                            <i class="fas fa-list-alt text-primary me-2"></i>Payroll Statement
                        </h5>
                        <p class="text-muted small mb-0 ms-4 ps-1">Comprehensive breakdown of all employee earnings and
                            deductions</p>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="salaryReportTable" class="table table-hover w-100 m-0">
                        <thead>
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Name</th>
                                <th>Bank Acc#</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Salary Details</th>
                                <th>Attendance Records</th>
                                <th>Leave Records</th>
                                <th>Unpaid Leave Records</th>
                                <th>Unpaid Leave amount Deduction</th>
                                <th>Basic Salary</th>
                                <th>Absents</th>
                                <th>Absents amount Deduction</th>
                                <th>No of Half Days</th>
                                <th>Half Days Deduction</th>
                                <th>Late Minutes</th>
                                <th>Late Minutes Deduction</th>
                                <th>Sand Wich Rule Deduction</th>
                                <th>Other Deduction</th>
                                <th>Tax Deduction</th>
                                <th>Income Tax</th>
                                <th>Insurance Deductions</th>
                                <th>Loan</th>
                                <th>Advance</th>
                                <th>Lunch Allowance</th>
                                <th>EOBI</th>
                                <th>Social Security</th>
                                <th>Performance Bonus</th>
                                <th>Year-end Bonus</th>
                                <th>Other Allowances</th>
                                <th>Total Increment</th>
                                <th>Gross Salary</th>
                                <th>Total Salary</th>
                                <th>Appraisal</th>
                                <th>Others</th>
                                <th>Misc</th>
                                <th>Total Earning</th>
                                <th>Total Deductions</th>
                                <th>Net Salary</th>
                                <th>Deduction before Compensation</th>
                                <th>Bonus</th>
                                <th>Compensation</th>
                                <th>Deduction after Compensation</th>
                                <th class="pe-4">Total Salary Approved</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Employee Details Modal -->
<div id="detailsModal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-xl" style="border-radius: 24px; overflow: hidden;">
            <div class="modal-header border-0 pb-0 shadow-sm"
                style="background: linear-gradient(to bottom, #f8faff, #ffffff); padding: 24px 32px 16px;">
                <div>
                    <h5 class="modal-title fw-bold"
                        style="background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                        Employee Payroll Breakdown
                    </h5>
                    <p class="text-muted small mb-0 mt-1">Detailed financial overview for the selected period</p>
                </div>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="detailsResult">
                {{-- Loaded via AJAX --}}
            </div>
            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-light btn-lg px-4" data-bs-dismiss="modal"
                    style="border-radius: 12px; font-weight: 600; font-size: 15px;">Close</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    {{-- Shared Scripts --}}
    @include('attendance_management.shared.scripts')

    {{-- Module Specific Scripts --}}
    <script src="{{ asset('js/core/salary-report/table.js') }}"></script>
@endpush

@include('layouts.footer')