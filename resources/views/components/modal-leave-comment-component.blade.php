<div id="leave_status_modal" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-premium">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-tasks mr-2"></i> Review Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateLeaveStatusForm" action="{{ route('dashboard.employee-leaves.update-status') }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="id" id="status_leave_id">
                    <input type="hidden" name="status" id="status_action">

                    <div class="alert alert-info border-0 shadow-sm rounded-lg mb-4">
                        <small class="font-weight-bold d-block mb-1">DECISION:</small>
                        <span id="status_label_text" class="h6 mb-0"></span>
                    </div>

                    <div class="form-group mb-4">
                        <label class="form-label-premium">Admin Remarks / Instructions</label>
                        <textarea rows="4" class="form-control form-control-premium" name="remarks" id="status_remarks"
                            placeholder="Optional notes for the employee..."></textarea>
                    </div>

                    <div class="text-right mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4 mr-2"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" id="confirm_status_btn" class="btn rounded-pill px-5 py-2">
                            <i class="fas fa-save mr-2"></i> Confirm Decision
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-approve-decision {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .btn-approve-decision:hover {
        color: white;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }

    .btn-reject-decision {
        background: linear-gradient(135deg, #f43f5e 0%, #e11d48 100%);
        color: white;
    }

    .btn-reject-decision:hover {
        color: white;
        box-shadow: 0 4px 12px rgba(244, 63, 94, 0.3);
    }
</style>