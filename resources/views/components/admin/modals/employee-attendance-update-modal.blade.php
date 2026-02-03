<div class="modal custom-modal fade" id="attendance_info_in" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title att-info">Attendance Info</h5>
                <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="employeeAttendanceUpdateForm" action="{{ route('dashboard.update-att') }}" method="POST"
                    novalidate>
                    @csrf
                    <input type="hidden" name="day_attendance" id="att_date_in">
                    <input type="hidden" name="employee_id" id="att_user_in">

                    <!-- Top Decision: Present or Absent -->
                    <div class="form-group text-center mb-4">
                        <label class="d-block mb-1"><strong>Select Attendance Status:</strong></label>
                        <div class="mb-3">
                            <span class="badge badge-pill badge-light current-status-text">New Record</span>
                        </div>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-outline-success">
                                <input type="radio" name="attendance_status" id="status_present" value="present"
                                    onchange="toggleAttendanceFields(this.value)"> Present
                            </label>
                            <label class="btn btn-outline-danger">
                                <input type="radio" name="attendance_status" id="status_absent" value="absent"
                                    onchange="toggleAttendanceFields(this.value)"> Absent/Leave
                            </label>
                        </div>
                    </div>

                    <!-- Present View: Timesheet & Activity -->
                    <div class="present-content" style="display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card punch-status">
                                    <div class="card-body">
                                        <h5 class="card-title">Timesheet <small class="text-muted day"></small></h5>
                                        <div class="punch-det">
                                            <h6 class="punch-status">Punch In at</h6>
                                            <p class="punch-in-time">NA</p>
                                        </div>
                                        <div class="punch-info">
                                            <div class="punch-hours">
                                                <span class="working-hours">0:00 hrs</span>
                                            </div>
                                        </div>
                                        <div class="punch-det">
                                            <h6>Punch Out at</h6>
                                            <p class="punch-out-time">NA</p>
                                        </div>
                                        <div class="statistics">
                                            <div class="row">
                                                <div class="text-center col-md-12 col-12">
                                                    <div class="stats-box">
                                                        <p>Break</p>
                                                        <h6>1.00 hrs ( 1 : 15pm to 2 : 15pm )</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Punch Inputs for Present -->
                                        <div class="timings punch-time-section mt-3">
                                            <div class="row">
                                                <div class="text-center col-md-6 col-6">
                                                    <div class="stats-box">
                                                        <p>Punch In</p>
                                                        <input type="time" class="form-control" name="punch_in_time">
                                                    </div>
                                                </div>
                                                <div class="text-center col-md-6 col-6">
                                                    <div class="stats-box">
                                                        <p>Punch Out</p>
                                                        <input type="time" class="form-control" name="punch_out_time">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card recent-activity">
                                    <div class="card-body">
                                        <h5 class="card-title">Activity</h5>
                                        <div class="eror text-danger"></div>
                                        <ul class="res-activity-list li-html"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Absent View: Leave Types -->
                    <div class="absent-content" style="display: none;">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="leave-type-section">
                                    <div class="form-group">
                                        <label>Leave Type</label>
                                        <select class="form-control" name="leave_type_id">
                                            <option value="">Select Leave Type</option>
                                            @if(isset($leaveTypes))
                                                @foreach($leaveTypes as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <textarea class="form-control" name="remarks" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4 text-center punch-btn-section" style="display: none;">
                        <hr>
                        <button type="submit" class="btn btn-primary punch-btn px-5">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>