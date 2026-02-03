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

        modal.find('.modal-title').text('Set Salary for ' + name);
        modal.find('[name="employee_id"]').val(id);
        modal.modal('show');
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
