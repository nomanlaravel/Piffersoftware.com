$(document).ready(function () {
    // CSRF Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Handle Set Salary Button
    $(document).on('click', '.set-salary-btn', function () {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let modal = $('#add_salary_formula');
        let form = $('#addMonthlySalaryForm');

        // Reset form and errors
        form[0].reset();
        $('.esf-errors-print').html('');
        modal.find('.modal-title').text('Salary Setup: ' + name);
        modal.find('[name="employee_id"]').val(id);

        // Fetch existing data
        $.ajax({
            url: '/employee-payroll/employee-salaries/get-detail/' + id,
            type: 'GET',
            beforeSend: function () {
                modal.find('.submit-btn').prop('disabled', true).text('Loading...');
            },
            success: function (res) {
                if (res.success && res.data) {
                    let d = res.data;

                    // Fill Bank Details
                    if (d.bank) {
                        form.find('[name="account_title"]').val(d.bank.account_title);
                        form.find('[name="account_number"]').val(d.bank.account_number);
                        form.find('[name="bank_name"]').val(d.bank.bank_name);
                        form.find('[name="branch_name"]').val(d.bank.branch_name);
                    }

                    // Fill Salary Details
                    if (d.salary) {
                        form.find('[name="basic_salary"]').val(d.salary.before_increment).trigger('keyup');

                        if (d.salary.time_period) {
                            let months = d.salary.time_period.split(' ')[0];
                            form.find('[name="increment_time"]').val(months);
                        }

                        // Set start date
                        if (d.salary.salary_start) {
                            form.find('[name="salary_start"]').val(d.salary.salary_start);
                        } else if (d.salary.created_at) {
                            let date = new Date(d.salary.created_at).toISOString().split('T')[0];
                            form.find('[name="salary_start"]').val(date);
                        }
                    }
                }
            },
            complete: function () {
                modal.find('.submit-btn').prop('disabled', false).text('Set Salary Slip');
                modal.modal('show');
            }
        });
    });

    // Form Submission
    $('#addMonthlySalaryForm').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serialize();

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function (res) {
                if (res.success) {
                    toastr.success(res.message);
                    $('#add_salary_formula').modal('hide');
                    form[0].reset();
                    if (window.esfTable) window.esfTable.ajax.reload();
                } else {
                    toastr.error(res.message);
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    $('.esf-errors-print').html('');
                    $.each(errors, function (key, value) {
                        $('.esf-errors-print').append('<div class="alert alert-danger">' + value[0] + '</div>');
                    });
                } else {
                    toastr.error('Something went wrong');
                }
            }
        });
    });

    // Handle Delete Salary Formula
    $(document).on('click', '.delete-salary-btn', function () {
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "This will remove the salary formula for this employee!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/employee-payroll/employee-salaries/delete/' + id,
                    type: 'DELETE',
                    success: function (res) {
                        if (res.success) {
                            toastr.success(res.message);
                            if (window.esfTable) window.esfTable.ajax.reload();
                        } else {
                            toastr.error(res.message);
                        }
                    }
                });
            }
        });
    });

    // Handle Increment Sheet Button
    $(document).on('click', '.view-increment-btn', function () {
        let id = $(this).data('id');
        let modal = $('#IncementSheetView');

        $.ajax({
            url: '/employee-payroll/employee-salaries/increment-sheet/' + id,
            type: 'GET',
            success: function (res) {
                if (res.success) {
                    modal.find('.modal-title').text('Increment History: ' + res.employee.name);
                    modal.find('.top-section').html('<strong>Current Basic: </strong>' + (res.employee.salary_status ? res.employee.salary_status.before_increment : 'N/A'));

                    let rows = '';
                    if (res.increments.length > 0) {
                        $.each(res.increments, function (i, inc) {
                            rows += '<tr><td>' + inc.month + '</td><td>' + inc.amount + '</td><td>' + inc.percentage + '%</td></tr>';
                        });
                    } else {
                        rows = '<tr><td colspan="3" class="text-center">No increment history found</td></tr>';
                    }
                    modal.find('.Last-incements-tb').html(rows);
                    modal.modal('show');
                }
            }
        });
    });
});
