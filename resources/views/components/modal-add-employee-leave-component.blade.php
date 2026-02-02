@php
    $leaveTypes = \App\Models\LeaveType::where('status', 'active')->get();
@endphp

<div id="add_leave" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-premium">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-paper-plane mr-2"></i> Submit Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addLeaveForm" action="{{ route('dashboard.employee-leaves.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="form-label-premium">Leave Category <span class="text-danger">*</span></label>
                        <select class="form-control form-control-premium" name="leave_type_id" required>
                            <option value="">Select leave type</option>
                            @foreach($leaveTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }} (Max: {{ $type->allowed }} days)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label-premium">Start Date <span class="text-danger">*</span></label>
                                <input class="form-control form-control-premium" type="date" name="start_date" required
                                    min="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label class="form-label-premium">End Date <span class="text-danger">*</span></label>
                                <input class="form-control form-control-premium" type="date" name="end_date" required
                                    min="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label-premium">Reason / Description <span
                                class="text-danger">*</span></label>
                        <textarea rows="4" class="form-control form-control-premium" name="description"
                            placeholder="Briefly explain the reason for leave..." required></textarea>
                    </div>
                    <div class="text-right mt-4">
                        <button type="button" class="btn btn-light rounded-pill px-4 mr-2"
                            data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-premium rounded-pill px-5 py-2">
                            <i class="fas fa-check mr-2"></i> Submit Request
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>