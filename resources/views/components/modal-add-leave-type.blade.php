<style>
    .modal-premium {
        border: none;
        border-radius: 20px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .modal-premium .modal-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 20px 20px 0 0;
        padding: 1.5rem 2rem;
    }

    .modal-premium .modal-title {
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .modal-premium .close {
        color: white;
        text-shadow: none;
        opacity: 0.8;
    }

    .modal-premium .modal-body {
        padding: 2rem;
    }

    .form-label-premium {
        font-weight: 600;
        color: #4a5568;
        font-size: 0.85rem;
        margin-bottom: 0.5rem;
    }

    .form-control-premium {
        border: 2px solid #edf2f7;
        border-radius: 12px;
        padding: 0.6rem 1rem;
        transition: all 0.2s;
        height: auto;
        min-height: 45px;
        color: #2d3748;
    }

    select.form-control-premium {
        appearance: auto;
        cursor: pointer;
    }

    .form-control-premium:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .custom-control-input:checked~.custom-control-label::before {
        background-color: #667eea;
        border-color: #667eea;
    }

    .modal-footer-premium {
        border-top: 1px solid #edf2f7;
        padding: 1.5rem 2rem;
    }
</style>

<!-- Add leave Type Modal -->
<div id="add_leave_type" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-premium">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-calendar-plus mr-2"></i> Configure Leave Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addLeaveTypeForm" action="{{ route('dashboard.leave-types.store') }}" method="POST"
                    novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label-premium">Leave Name <span class="text-danger">*</span></label>
                            <input class="form-control form-control-premium" type="text"
                                placeholder="e.g. Annual Leave, Sick Leave" name="name" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label-premium">Days Allowed <span class="text-danger">*</span></label>
                            <input class="form-control form-control-premium" type="number" placeholder="Number of days"
                                name="allowed" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label-premium">Reset Cycle <span class="text-danger">*</span></label>
                            <select class="form-control form-control-premium" name="time_span" required>
                                <option value="">Select refresh frequency</option>
                                <option value="annualy">Every Year (Jan 1st)</option>
                                <option value="monthly">Every Month</option>
                                <option value="once">Once (Permanent)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label-premium">Availability Status</label>
                            <div class="d-flex mt-2">
                                <div class="custom-control custom-radio mr-4">
                                    <input type="radio" id="statusActive" name="status" class="custom-control-input"
                                        value="active" checked>
                                    <label class="custom-control-label" for="statusActive">Active (Available)</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="statusHeld" name="status" class="custom-control-input"
                                        value="held">
                                    <label class="custom-control-label" for="statusHeld">Held (Disabled)</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="custom-control custom-checkbox mt-2">
                                <input type="checkbox" class="custom-control-input" name="paid" id="isPaid" value="true"
                                    checked>
                                <label class="custom-control-label font-weight-bold" for="isPaid">Mark as Paid
                                    Leave</label>
                                <p class="text-muted small mt-1">If enabled, deductions from salary will not occur for
                                    this leave type.</p>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4 mr-2"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-premium rounded-pill px-5 py-2">
                            <i class="fas fa-save mr-2"></i> <span class="submit-btn-text">Save Configuration</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>