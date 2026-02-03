@include('layouts.header')

@push('css')
    @include('vendors.data-tables')
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            --card-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .premium-header {
            background: var(--primary-gradient);
            padding: 3rem 2rem;
            border-radius: 0 0 40px 40px;
            margin-bottom: -4rem;
            color: white;
        }

        .table-card {
            background: white;
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
            margin-top: 2rem;
        }

        .filter-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
        }

        .form-control-premium {
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            padding: 0.5rem 1rem;
        }

        #salaryReportTable thead th {
            background: #f9fafb;
            color: #4b5563;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            padding: 1.25rem 1rem;
            border: none;
        }

        #salaryReportTable tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #f3f4f6;
        }
    </style>
@endpush

<div class="customer_form">
    @include('headerlogout')

    <div class="premium-header">
        <div class="container-fluid text-center">
            <h1 class="font-weight-bold mb-2">Monthly Salary Report</h1>
            <p class="opacity-75">Overview of employee earnings and deductions</p>
        </div>
    </div>

    <div class="container-fluid py-5 mt-n4">
        {{-- Filters --}}
        <div class="filter-card">
            <form id="filterForm" class="row align-items-end">
                <div class="col-md-4">
                    <label class="small font-weight-bold">Select Month</label>
                    <select name="month" class="form-control form-control-premium">
                        @foreach($months as $num => $name)
                            <option value="{{ $num }}" {{ $num == date('n') ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="small font-weight-bold">Select Year</label>
                    <select name="year" class="form-control form-control-premium">
                        @foreach($years as $year)
                            <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mt-3 mt-md-0">
                    <button type="submit" class="btn btn-primary w-100 py-2 font-weight-bold"
                        style="border-radius: 10px;">
                        <i class="fas fa-search mr-2"></i> Generate Report
                    </button>
                </div>
            </form>
        </div>

        {{-- Report Table --}}
        <div class="table-card">
            <div class="table-responsive">
                <table id="salaryReportTable" class="table w-100">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Bank Acc#</th>
                            <th>Designation</th>
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
                            <th>Loan</th>
                            <th>Total Increment</th>
                            <th>Total Salary</th>
                            <th>Deduction befor Compensation</th>
                            <th>Bouns</th>
                            <th>Compensation</th>
                            <th>Deduction after Compensation</th>
                            <th>Total Salary approved</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Employee Details Modal -->
<div id="detailsModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header bg-light">
                <h5 class="modal-title font-weight-bold">Employee Breakdown</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4" id="detailsResult">
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            let table = $('#salaryReportTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.employee-payroll.salary-report.data') }}",
                    data: function (d) {
                        d.month = $('select[name="month"]').val();
                        d.year = $('select[name="year"]').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'bank_account', name: 'bank_account' },
                    { data: 'designation', name: 'designation' },
                    { data: 'basic_salary', name: 'basic_salary' },
                    { data: 'absents', name: 'absents' },
                    { data: 'absent_deduction', name: 'absent_deduction' },
                    { data: 'half_days', name: 'half_days' },
                    { data: 'half_day_deduction', name: 'half_day_deduction' },
                    { data: 'late_minutes', name: 'late_minutes' },
                    { data: 'late_minutes_deduction', name: 'late_minutes_deduction' },
                    { data: 'sandwich_rule_deduction', name: 'sandwich_rule_deduction' },
                    { data: 'other_deduction', name: 'other_deduction' },
                    { data: 'tax_deduction', name: 'tax_deduction' },
                    { data: 'loan', name: 'loan' },
                    { data: 'total_increment', name: 'total_increment' },
                    { data: 'total_salary', name: 'total_salary' },
                    { data: 'deduction_before_compensation', name: 'deduction_before_compensation' },
                    { data: 'bonus', name: 'bonus' },
                    { data: 'compensation', name: 'compensation' },
                    { data: 'deduction_after_compensation', name: 'deduction_after_compensation' },
                    { data: 'total_salary_approved', name: 'total_salary_approved' }
                ],
                order: [[1, 'asc']],
                pageLength: 25,
                language: {
                    processing: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
                }
            });

            $('#filterForm').on('submit', function (e) {
                e.preventDefault();
                table.draw();
            });

            // Handle View Details Click
            $(document).on('click', '.view-details-btn', function () {
                let id = $(this).data('id');
                let month = $('select[name="month"]').val();
                let year = $('select[name="year"]').val();
                let modal = $('#detailsModal');

                modal.modal('show');
                $('#detailsResult').html('<div class="text-center py-5"><div class="spinner-border text-primary"></div></div>');

                $.ajax({
                    url: '/employee-payroll/employee-salaries/get-detail/' + id,
                    type: 'GET',
                    data: { month: month, year: year },
                    success: function (res) {
                        if (res.success) {
                            let d = res.data;
                            let html = `
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <p class="mb-1 text-muted small uppercase font-weight-bold">Employee</p>
                                            <h4 class="font-weight-bold">${d.employee.name}</h4>
                                        </div>
                                        <div class="col-md-6 text-md-right">
                                            <p class="mb-1 text-muted small uppercase font-weight-bold">Period</p>
                                            <h4 class="font-weight-bold">${month}/${year}</h4>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm border">
                                            <tr class="bg-light">
                                                <th colspan="2">Financial Overview</th>
                                            </tr>
                                            <tr>
                                                <td>Basic Salary</td>
                                                <td class="text-right font-weight-bold">₨ ${d.salary ? d.salary.before_increment : '0.00'}</td>
                                            </tr>
                                            <tr>
                                                <td>Account Details</td>
                                                <td class="text-right">${d.bank ? d.bank.bank_name + ' (' + d.bank.account_number + ')' : 'Not Set'}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="alert alert-info py-2 small">
                                        <i class="fas fa-info-circle mr-1"></i> For attendance punch logs, please visit the Attendance Management module.
                                    </div>
                                `;
                            $('#detailsResult').html(html);
                        }
                    }
                });
            });
        });
    </script>
@endpush

@include('layouts.footer')