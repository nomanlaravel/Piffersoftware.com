<div class="modal custom-modal fade" id="attendance_info_in" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modern-modal">
            <div class="modal-header gradient-header">
                <div class="header-content">
                    <h5 class="modal-title att-info">
                        <i class="fa fa-calendar-check-o mr-2"></i>
                        Attendance Info
                    </h5>
                    <p class="modal-subtitle mb-0">Manage employee attendance records</p>
                </div>
                <button type="button" class="close-btn" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>

            <div class="modal-body modern-modal-body">
                <form class="employeeAttendanceUpdateForm" action="{{ route('dashboard.update-att') }}" method="POST"
                    novalidate>
                    @csrf
                    <input type="hidden" name="day_attendance" id="att_date_in">
                    <input type="hidden" name="employee_id" id="att_user_in">

                    <!-- Status Badge -->
                    <div class="status-badge-container text-center mb-4">
                        <span class="badge badge-pill status-badge current-status-text">
                            <i class="fa fa-circle-o-notch fa-spin mr-1"></i>
                            Checking Status...
                        </span>
                    </div>

                    <!-- Toggle Buttons -->
                    <div class="attendance-toggle-section">
                        <label class="toggle-label">
                            <i class="fa fa-hand-pointer-o mr-2"></i>
                            Select Attendance Status
                        </label>
                        <div class="toggle-btn-group">
                            <label class="toggle-option present-option">
                                <input type="radio" name="attendance_status" id="status_present" value="present"
                                    onchange="toggleAttendanceFields(this.value)">
                                <span class="toggle-content">
                                    <i class="fa fa-check-circle"></i>
                                    <span class="toggle-text">Present</span>
                                </span>
                            </label>
                            <label class="toggle-option leave-option">
                                <input type="radio" name="attendance_status" id="status_leave" value="leave"
                                    onchange="toggleAttendanceFields(this.value)">
                                <span class="toggle-content">
                                    <i class="fa fa-calendar-minus-o"></i>
                                    <span class="toggle-text">Leave</span>
                                </span>
                            </label>
                            <label class="toggle-option absent-option">
                                <input type="radio" name="attendance_status" id="status_absent" value="absent"
                                    onchange="toggleAttendanceFields(this.value)">
                                <span class="toggle-content">
                                    <i class="fa fa-times-circle"></i>
                                    <span class="toggle-text">Absent</span>
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Present View: Timesheet & Activity -->
                    <div class="present-content attendance-section" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-card timesheet-card">
                                    <div class="card-icon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <h6 class="card-title-sm">
                                        Timesheet
                                        <span class="badge badge-date day">--</span>
                                    </h6>

                                    <div class="time-info-grid">
                                        <div class="time-info-item punch-in-section">
                                            <label><i class="fa fa-sign-in mr-1"></i> Punch In</label>
                                            <p class="time-value punch-in-time">Not Available</p>
                                        </div>
                                        <div class="time-info-item punch-out-section">
                                            <label><i class="fa fa-sign-out mr-1"></i> Punch Out</label>
                                            <p class="time-value punch-out-time">Not Available</p>
                                        </div>
                                    </div>

                                    <div class="working-hours-display">
                                        <div class="hours-icon">
                                            <i class="fa fa-hourglass-half"></i>
                                        </div>
                                        <div class="hours-info">
                                            <label>Total Working Hours</label>
                                            <h4 class="working-hours">0:00 hrs</h4>
                                        </div>
                                    </div>

                                    <div class="break-info">
                                        <i class="fa fa-coffee mr-2"></i>
                                        <span>Break: 1.00 hrs (1:15pm - 2:15pm)</span>
                                    </div>

                                    <!-- Punch Time Inputs -->
                                    <div class="punch-inputs-section mt-4">
                                        <h6 class="section-title">
                                            <i class="fa fa-edit mr-2"></i>Update Time
                                        </h6>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="modern-input-group">
                                                    <label>Punch In Time</label>
                                                    <div class="input-with-icon">
                                                        <i class="fa fa-sign-in"></i>
                                                        <input type="time" class="modern-input" name="punch_in_time">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="modern-input-group">
                                                    <label>Punch Out Time</label>
                                                    <div class="input-with-icon">
                                                        <i class="fa fa-sign-out"></i>
                                                        <input type="time" class="modern-input" name="punch_out_time">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="info-card activity-card">
                                    <div class="card-icon">
                                        <i class="fa fa-list-ul"></i>
                                    </div>
                                    <h6 class="card-title-sm">Recent Activity</h6>
                                    <div class="error-message text-danger eror"></div>
                                    <ul class="activity-list li-html">
                                        <li class="no-activity">
                                            <i class="fa fa-info-circle mr-2"></i>
                                            No activity recorded
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Leave View: Leave Types -->
                    <div class="leave-content attendance-section" style="display: none;">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="info-card leave-card">
                                    <div class="card-icon">
                                        <i class="fa fa-calendar-times-o"></i>
                                    </div>
                                    <h6 class="card-title-sm">Leave Information</h6>

                                    <div class="modern-input-group">
                                        <label>
                                            <i class="fa fa-tag mr-2"></i>Leave Type
                                        </label>
                                        <select class="modern-select" name="leave_type_id">
                                            <option value="">Select Leave Type</option>
                                            @if(isset($leaveTypes))
                                                @foreach($leaveTypes as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="modern-input-group">
                                        <label>
                                            <i class="fa fa-comment mr-2"></i>Remarks
                                        </label>
                                        <textarea class="modern-textarea" name="remarks" rows="4"
                                            placeholder="Enter any additional notes or reasons..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Absent View: Simple Remarks -->
                    <div class="absent-content attendance-section" style="display: none;">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="info-card absent-card">
                                    <div class="card-icon">
                                        <i class="fa fa-user-times"></i>
                                    </div>
                                    <h6 class="card-title-sm">Absent Information</h6>

                                    <div class="modern-input-group">
                                        <label>
                                            <i class="fa fa-comment mr-2"></i>Remarks/Reason
                                        </label>
                                        <textarea class="modern-textarea" name="remarks" rows="4"
                                            placeholder="Enter reason for absence..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Financial Adjustment: Custom Day Salary -->
                    <div class="financial-adjustment-section attendance-section mt-4" style="display: none;">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="info-card salary-card">
                                    <div class="card-icon">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <h6 class="card-title-sm">Financial Adjustment</h6>
                                    
                                    <div class="modern-input-group">
                                        <label>
                                            <i class="fa fa-dollar mr-2"></i>Day Salary (Custom)
                                        </label>
                                        <div class="input-with-icon">
                                            <i class="fa fa-money"></i>
                                            <input type="number" step="0.01" class="modern-input" name="custom_daily_salary" placeholder="Enter custom salary for this day (Optional)">
                                        </div>
                                        <small class="text-muted mt-2 d-block">
                                            <i class="fa fa-info-circle mr-1"></i> If set, this will override the fixed daily salary calculation for this specific date.
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="modal-footer-custom punch-btn-section" style="display: none;">
                        <button type="submit" class="btn-modern btn-primary-gradient punch-btn">
                            <i class="fa fa-floppy-o mr-2"></i>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Modern Modal Styling */
    .modern-modal {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: modalSlideIn 0.4s ease-out;
    }

    @keyframes modalSlideIn {
        from {
            opacity: 0;
            transform: translateY(-50px) scale(0.9);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .gradient-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 28px 32px;
        border-bottom: none;
        position: relative;
        overflow: hidden;
    }

    .gradient-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
        animation: headerGlow 8s ease-in-out infinite;
    }

    @keyframes headerGlow {

        0%,
        100% {
            transform: translate(0, 0);
        }

        50% {
            transform: translate(-20px, -20px);
        }
    }

    .header-content {
        position: relative;
        z-index: 1;
    }

    .modal-title {
        margin: 0;
        font-size: 22px;
        font-weight: 700;
        letter-spacing: -0.3px;
        display: flex;
        align-items: center;
    }

    .modal-subtitle {
        font-size: 13px;
        opacity: 0.9;
        margin-top: 4px;
        font-weight: 400;
    }

    .close-btn {
        position: absolute;
        top: 24px;
        right: 24px;
        background: rgba(255, 255, 255, 0.2);
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 2;
        color: white;
        font-size: 18px;
    }

    .close-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }

    .modern-modal-body {
        padding: 32px;
        background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
    }

    /* Status Badge */
    .status-badge-container {
        margin-bottom: 24px;
    }

    .status-badge {
        padding: 10px 24px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .status-badge.badge-light {
        background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
        color: #475569;
    }

    .status-badge.badge-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(17, 153, 142, 0.3);
    }

    .status-badge.badge-danger {
        background: linear-gradient(135deg, #ee0979 0%, #ff6a00 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(238, 9, 121, 0.3);
    }

    .status-badge.badge-warning {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
        box-shadow: 0 4px 12px rgba(240, 147, 251, 0.3);
    }

    /* Toggle Section */
    .attendance-toggle-section {
        margin-bottom: 32px;
    }

    .toggle-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 12px;
        text-align: center;
    }

    .toggle-btn-group {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 16px;
    }

    .toggle-option {
        position: relative;
        cursor: pointer;
        margin: 0;
    }

    .toggle-option input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .toggle-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        padding: 20px;
        background: white;
        border: 3px solid #e2e8f0;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .toggle-content i {
        font-size: 32px;
        transition: all 0.3s ease;
    }

    .toggle-text {
        font-size: 15px;
        font-weight: 600;
        color: #475569;
    }

    .present-option .toggle-content {
        border-color: #e2e8f0;
    }

    .present-option .toggle-content i {
        color: #cbd5e1;
    }

    .present-option input:checked~.toggle-content {
        background: linear-gradient(135deg, rgba(17, 153, 142, 0.1) 0%, rgba(56, 239, 125, 0.1) 100%);
        border-color: #11998e;
        box-shadow: 0 4px 16px rgba(17, 153, 142, 0.2);
    }

    .present-option input:checked~.toggle-content i {
        color: #11998e;
        transform: scale(1.1);
    }

    .present-option input:checked~.toggle-content .toggle-text {
        color: #11998e;
    }

    .leave-option .toggle-content {
        border-color: #e2e8f0;
    }

    .leave-option .toggle-content i {
        color: #cbd5e1;
    }

    .leave-option input:checked~.toggle-content {
        background: linear-gradient(135deg, rgba(240, 147, 251, 0.1) 0%, rgba(245, 87, 108, 0.1) 100%);
        border-color: #f093fb;
        box-shadow: 0 4px 16px rgba(240, 147, 251, 0.2);
    }

    .leave-option input:checked~.toggle-content i {
        color: #f093fb;
        transform: scale(1.1);
    }

    .leave-option input:checked~.toggle-content .toggle-text {
        color: #f093fb;
    }

    .absent-option .toggle-content {
        border-color: #e2e8f0;
    }

    .absent-option .toggle-content i {
        color: #cbd5e1;
    }

    .absent-option input:checked~.toggle-content {
        background: linear-gradient(135deg, rgba(238, 9, 121, 0.1) 0%, rgba(255, 106, 0, 0.1) 100%);
        border-color: #ee0979;
        box-shadow: 0 4px 16px rgba(238, 9, 121, 0.2);
    }

    .absent-option input:checked~.toggle-content i {
        color: #ee0979;
        transform: scale(1.1);
    }

    .absent-option input:checked~.toggle-content .toggle-text {
        color: #ee0979;
    }

    .toggle-option:hover .toggle-content {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    /* Info Cards */
    .info-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
        border: 1px solid #e2e8f0;
        position: relative;
        overflow: hidden;
        height: 100%;
    }

    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
    }

    .timesheet-card::before {
        background: linear-gradient(90deg, #667eea, #764ba2);
    }

    .activity-card::before {
        background: linear-gradient(90deg, #4facfe, #00f2fe);
    }

    .leave-card::before {
        background: linear-gradient(90deg, #f093fb, #f5576c);
    }

    .absent-card::before {
        background: linear-gradient(90deg, #ee0979, #ff6a00);
    }

    .salary-card::before {
        background: linear-gradient(90deg, #11998e, #38ef7d);
    }

    .card-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 16px;
    }

    .card-icon i {
        font-size: 24px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .card-title-sm {
        font-size: 16px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 20px;
    }

    .badge-date {
        font-size: 11px;
        padding: 4px 12px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 50px;
        font-weight: 600;
    }

    /* Time Info Grid */
    .time-info-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
        margin-bottom: 20px;
    }

    .time-info-item {
        background: linear-gradient(135deg, #f8f9ff 0%, #ffffff 100%);
        padding: 16px;
        border-radius: 12px;
        border: 1px solid #e2e8f0;
    }

    .time-info-item label {
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
        margin-bottom: 8px;
        display: block;
    }

    .time-value {
        font-size: 18px;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
    }

    /* Working Hours Display */
    .working-hours-display {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        padding: 20px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
        border: 2px dashed rgba(102, 126, 234, 0.3);
    }

    .hours-icon {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
    }

    .hours-info label {
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
        margin-bottom: 4px;
        display: block;
    }

    .hours-info h4 {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .break-info {
        font-size: 13px;
        color: #64748b;
        padding: 12px;
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(251, 191, 36, 0.1) 100%);
        border-radius: 8px;
        border-left: 3px solid #f59e0b;
    }

    /* Punch Inputs Section */
    .punch-inputs-section {
        padding-top: 20px;
        border-top: 2px dashed #e2e8f0;
    }

    .section-title {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 16px;
    }

    .modern-input-group {
        margin-bottom: 20px;
    }

    .modern-input-group label {
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
        display: block;
    }

    .input-with-icon {
        position: relative;
    }

    .input-with-icon i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-size: 16px;
    }

    .modern-input {
        width: 100%;
        height: 48px;
        padding: 0 16px 0 48px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        color: #2d3748;
        transition: all 0.3s ease;
        background: white;
    }

    .modern-input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .modern-select {
        width: 100%;
        height: 48px;
        padding: 0 16px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        color: #2d3748;
        transition: all 0.3s ease;
        background: white;
        cursor: pointer;
    }

    .modern-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .modern-textarea {
        width: 100%;
        padding: 16px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        color: #2d3748;
        transition: all 0.3s ease;
        resize: vertical;
        font-family: 'Inter', sans-serif;
    }

    .modern-textarea:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    /* Activity List */
    .activity-list {
        list-style: none;
        padding: 0;
        margin: 0;
        max-height: 300px;
        overflow-y: auto;
    }

    .activity-list li {
        padding: 14px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.2s ease;
    }

    .activity-list li:last-child {
        border-bottom: none;
    }

    .activity-list li:hover {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
    }

    .activity-list li.no-activity {
        color: #94a3b8;
        justify-content: center;
        font-style: italic;
    }

    .res-activity-time {
        font-weight: 600;
        color: #2d3748;
    }

    .delete-punch {
        color: #ef4444;
        cursor: pointer;
        transition: all 0.3s ease;
        padding: 6px;
    }

    .delete-punch:hover {
        color: #dc2626;
        transform: scale(1.2);
    }

    /* Modal Footer */
    .modal-footer-custom {
        padding: 24px 32px;
        border-top: 2px solid #e2e8f0;
        text-align: center;
        background: #f8f9ff;
    }

    .btn-modern {
        padding: 14px 40px;
        border: none;
        border-radius: 50px;
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-primary-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
    }

    .btn-primary-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s;
    }

    .btn-primary-gradient:hover::before {
        left: 100%;
    }

    .btn-primary-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(102, 126, 234, 0.5);
    }

    .btn-primary-gradient:active {
        transform: translateY(0);
    }

    /* Responsive */
    .stats-container {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .stat-item {
        font-size: 12px;
        color: #64748b;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .stat-counts {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .badge-success-light {
        background: #ecfdf5;
        color: #059669;
        border: 1px solid #10b981;
    }

    .badge-warning-light {
        background: #fffbeb;
        color: #d97706;
        border: 1px solid #f59e0b;
    }

    .badge-danger-light {
        background: #fef2f2;
        color: #dc2626;
        border: 1px solid #ef4444;
    }

    .leave-report-section {
        background: rgba(255, 255, 255, 0.5);
        border-radius: 12px;
        padding: 15px;
    }

    .leave-summary-table {
        margin-bottom: 0;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        overflow: hidden;
    }

    .leave-summary-table thead th {
        font-size: 11px;
        text-transform: uppercase;
        color: #64748b;
        border-bottom: 2px solid #e2e8f0;
    }

    .leave-summary-table td {
        font-size: 13px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
        font-weight: 500;
    }

    .leave-count-badge {
        display: inline-block;
        padding: 2px 8px;
        border-radius: 50px;
        font-size: 11px;
        font-weight: 700;
    }

    .count-used {
        background: #fef2f2;
        color: #dc2626;
    }

    .count-remaining {
        background: #ecfdf5;
        color: #059669;
    }

    @media (max-width: 768px) {
        .modal-dialog {
            margin: 16px;
        }

        .modern-modal-body {
            padding: 20px;
        }

        .gradient-header {
            padding: 20px 24px;
        }

        .toggle-btn-group {
            grid-template-columns: 1fr;
        }

        .time-info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>