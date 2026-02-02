$(function () {
    // Submit Leave Form
    $(document).on("submit", "#addLeaveForm", async function (e) {
        e.preventDefault();
        var form = $(this);
        var btn = form.find('button[type="submit"]');

        btn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin mr-2"></i> Submitting...');

        try {
            const formData = new FormData(this);
            const response = await fetch(form.attr('action'), {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                toastr.success(result.message || "Request submitted successfully");
                $('#add_leave').modal('hide');
                form[0].reset();
                if (window.refreshTable) refreshTable();
            } else {
                let errorMsg = result.message || "Failed to submit request";
                if (result.errors) {
                    errorMsg = Object.values(result.errors).flat().join("<br>");
                }
                Swal.fire({ icon: 'error', title: 'Action Denied', html: errorMsg });
            }
        } catch (error) {
            console.error('Error:', error);
            toastr.error("A technical error occurred. Please try again later.");
        } finally {
            btn.prop('disabled', false).html('<i class="fas fa-check mr-2"></i> Submit Request');
        }
    });

    // Handle Status Update (Approve/Reject)
    $(document).on("click", ".update-leave-status", function () {
        var id = $(this).data('id');
        var action = $(this).data('action');
        var modal = $('#leave_status_modal');
        var btn = $('#confirm_status_btn');

        $('#status_leave_id').val(id);
        $('#status_action').val(action);
        $('#status_remarks').val('');

        if (action === 'approved') {
            $('#status_label_text').text('Mark this leave as APPROVED?').addClass('text-success').removeClass('text-danger');
            btn.addClass('btn-approve-decision').removeClass('btn-reject-decision');
        } else {
            $('#status_label_text').text('Mark this leave as REJECTED?').addClass('text-danger').removeClass('text-success');
            btn.addClass('btn-reject-decision').removeClass('btn-approve-decision');
        }

        modal.modal('show');
    });

    // Submit Status Update
    $(document).on("submit", "#updateLeaveStatusForm", async function (e) {
        e.preventDefault();
        var form = $(this);
        var btn = $('#confirm_status_btn');

        btn.prop('disabled', true).prepend('<i class="fas fa-spinner fa-spin mr-2"></i> ');

        try {
            const formData = new FormData(this);
            const response = await fetch(form.attr('action'), {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                toastr.success(result.message);
                $('#leave_status_modal').modal('hide');
                if (window.refreshTable) refreshTable();
            } else {
                Swal.fire({ icon: 'error', title: 'Failed', text: result.message || "Update failed" });
            }
        } catch (error) {
            toastr.error("Connection error");
        } finally {
            btn.prop('disabled', false).find('.fa-spin').remove();
        }
    });
});
