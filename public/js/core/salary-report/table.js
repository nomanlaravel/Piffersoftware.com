$(document).ready(function () {
    if ($('#salaryReportTable').length > 0) {
        window.salaryReportTable = $('#salaryReportTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/employee-payroll/salary-report/data",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
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
                { data: 'department', name: 'department' },
                { data: 'salary_details', name: 'salary_details' },
                { data: 'attendance_records', name: 'attendance_records' },
                { data: 'leave_records', name: 'leave_records' },
                { data: 'unpaid_leave_record', name: 'unpaid_leave_record' },
                { data: 'unpaid_leave_deduction', name: 'unpaid_leave_deduction' },
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
                { data: 'income_tax', name: 'income_tax' },
                { data: 'insurance_deductions', name: 'insurance_deductions' },
                { data: 'loan', name: 'loan' },
                { data: 'advance', name: 'advance' },
                { data: 'lunch_allowance', name: 'lunch_allowance' },
                { data: 'eobi', name: 'eobi' },
                { data: 'social_security', name: 'social_security' },
                { data: 'performance_bonus', name: 'performance_bonus' },
                { data: 'year_end_bonus', name: 'year_end_bonus' },
                { data: 'other_allowances', name: 'other_allowances' },
                { data: 'total_increment', name: 'total_increment' },
                { data: 'gross_salary', name: 'gross_salary' },
                { data: 'total_salary', name: 'total_salary' },
                { data: 'appraisal', name: 'appraisal' },
                { data: 'others', name: 'others' },
                { data: 'misc', name: 'misc' },
                { data: 'total_earning', name: 'total_earning' },
                { data: 'total_deductions', name: 'total_deductions' },
                { data: 'net_salary', name: 'net_salary' },
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
            },
            responsive: false // 42 columns need horizontal scroll instead of responsive hide/show
        });
    }

    $('#filterForm').on('submit', function (e) {
        e.preventDefault();
        if (window.salaryReportTable) {
            window.salaryReportTable.draw();
        }
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
                            <div class="col-md-6 text-start">
                                <p class="mb-1 text-muted small text-uppercase fw-bold">Employee</p>
                                <h4 class="fw-bold">${d.employee.name}</h4>
                            </div>
                            <div class="col-md-6 text-md-end">
                                <p class="mb-1 text-muted small text-uppercase fw-bold">Period</p>
                                <h4 class="fw-bold">${month}/${year}</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm border">
                                <tr class="bg-light">
                                    <th colspan="2" class="p-2">Financial Overview</th>
                                </tr>
                                <tr>
                                    <td class="p-2">Basic Salary</td>
                                    <td class="text-end fw-bold p-2">₨ ${d.salary ? d.salary.before_increment : '0.00'}</td>
                                </tr>
                                <tr>
                                    <td class="p-2">Account Details</td>
                                    <td class="text-end p-2">${d.bank ? d.bank.bank_name + ' (' + d.bank.account_number + ')' : 'Not Set'}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="alert alert-info py-2 small mt-3">
                            <i class="fas fa-info-circle me-1"></i> For attendance punch logs, please visit the Attendance Management module.
                        </div>
                    `;
                    $('#detailsResult').html(html);
                }
            },
            error: function () {
                $('#detailsResult').html('<div class="alert alert-danger">Error fetching details</div>');
            }
        });
    });
});
