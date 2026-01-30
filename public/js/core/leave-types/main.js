$(function () {
    // Save Leave Type
    $(document).on("submit", "#addLeaveTypeForm", async function (e) {
        e.preventDefault();
        var form = $(this);

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
                toastr.success(result.message || "Leave Type saved", "Success");
                $('#add_leave_type').modal('hide');
                form[0].reset();
                if (window.refreshTable) refreshTable();
            } else {
                // If validation error or server error
                let errorMsg = result.message || "Action failed";
                if (result.errors) {
                    errorMsg = Object.values(result.errors).flat().join("<br>");
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errorMsg
                });
            }
        } catch (error) {
            console.error('Submit Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "A network error occurred or the server returned an invalid response."
            });
        }
    });

    // Handle Edit Click
    $(document).on("click", ".edit-leave-type", function () {
        var data = $(this).data('item');
        var modal = $('#add_leave_type');
        modal.find('.modal-title').text('Edit Leave Type');
        modal.find('input[name="name"]').val(data.name);
        modal.find('input[name="allowed"]').val(data.allowed);
        modal.find('select[name="time_span"]').val(data.time_span);
        modal.find('input[name="status"][value="' + data.status + '"]').prop('checked', true);
        modal.find('input[name="paid"]').prop('checked', data.paid == 1);

        // Change form action for update
        var form = modal.find('form');
        form.attr('action', '/leave-types/update');
        form.find('.submit-btn-text').text('Update Configuration');
        form.append('<input type="hidden" name="id" value="' + data.id + '">');

        modal.modal('show');
    });

    // Reset form when modal closed
    $('#add_leave_type').on('hidden.bs.modal', function () {
        var modal = $(this);
        modal.find('.modal-title').text('Add Leave Type');
        var form = modal.find('form');
        form[0].reset();
        form.attr('action', '/leave-types/store');
        form.find('.submit-btn-text').text('Save Configuration');
        form.find('input[name="id"]').remove();
    });
});
