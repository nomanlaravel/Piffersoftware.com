@include('layouts.header')

<!-- CSS Dependencies -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    li {
        cursor: pointer;
    }

    .select2-container {
        width: 100% !important;
    }

    /* Side-bar margin fix */
    .customer_form {
        margin-left: 15% !important;
        padding: 30px !important;
        width: 85% !important;
        box-sizing: border-box;
    }

    @media screen and (max-width: 991px) {
        .customer_form {
            margin-left: 0 !important;
            width: 100% !important;
            padding: 15px !important;
        }
    }

    /* Table Statistics Styling */
    .stats-column {
        min-width: 150px;
        font-size: 11px;
        line-height: 1.4;
    }

    .stats-item {
        display: block;
        white-space: nowrap;
    }

    .table thead th {
        background-color: #f8f9fa;
        vertical-align: middle;
    }

    /* Holiday Highlighting */
    .holiday-bg {
        background-color: #fff3cd !important;
        /* Light yellow bootstrap warning bg */
    }

    .holiday-icon {
        color: #856404 !important;
        /* Darker brown/gold for contrast on yellow */
        font-size: 1.1rem;
    }

    .holiday-present {
        color: #198754 !important;
        /* Success green */
        position: relative;
    }

    .holiday-present::after {
        content: '\f005';
        /* font-awesome star */
        font-family: FontAwesome;
        font-size: 0.5rem;
        position: absolute;
        top: -5px;
        right: -5px;
        color: #856404;
    }
</style>

<div class="customer_form">
    @include('headerlogout')
    <x-bread-crumb-component :modal=false />

    @if (\Session::has('message') || isset($message))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check" aria-hidden="true"></i><strong class="ml-2">{{ \Session::get('message') }}
                {{ $message ?? 'Done' }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h2>Attendance Details</h2>
        </div>
        <div class="card-body">
            <form class="mb-4" id="adminEmployeeAttendance" method="GET" novalidate>
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus">
                            <select class="select select2 floating" name="employee_id" required>
                                <option value="">Employee</option>
                                @forelse ($employeesT as $employee)
                                    <option value="{{ $employee->id }}">
                                        employeeId - {{ $employee->id }}
                                    </option>
                                @empty
                                    <option value="">No employee found.</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <select class="select select2 floating" name="month" required>
                                <option value="">Month</option>
                                <option>Jan</option>
                                <option>Feb</option>
                                <option>Mar</option>
                                <option>Apr</option>
                                <option>May</option>
                                <option>Jun</option>
                                <option>Jul</option>
                                <option>Aug</option>
                                <option>Sep</option>
                                <option>Oct</option>
                                <option>Nov</option>
                                <option>Dec</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="form-group form-focus select-focus">
                            <select class="select select2 floating" name="year" required>
                                <option value="">Year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button type="submit" class="btn btn-success btn-block"> Search </button>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Statistics</th>
                                    @foreach ($monthDays as $item)
                                        <th class="{{ $holiDayData->has($item) ? 'holiday-bg' : '' }} text-center">
                                            {{ \Carbon\Carbon::parse($item)->format('d') }}
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $employee)
                                    <tr>
                                        <td>
                                            {{ $employee->name }} {{ $employee->id }}
                                        </td>
                                        <td class="stats-column">
                                            <span class="stats-item">TD: {{ count($monthDays) }} | WD:
                                                {{ $workingDays }}</span>
                                            <span class="stats-item">P: {{ $employee->attendances->count() }} | A:
                                                {{ count($monthDays) - $employee->attendances->count() - $holiDayData->count() }}</span>
                                            <span class="stats-item">HOLIDAYS: {{ $holiDayData->count() }}</span>
                                        </td>
                                        @foreach ($monthDays as $attendance => $val)
                                            @php
                                                $dayAttendance = $employee->attendances->firstWhere('date', $val);
                                                $isHoliday = $holiDayData->has($val);
                                                $holidayInfo = $isHoliday ? $holiDayData->get($val) : null;
                                            @endphp
                                            @if ($dayAttendance)
                                                <td class="{{ $isHoliday ? 'holiday-bg' : '' }}">
                                                    <a href="javascript:void(0);" class="view-attendance-details"
                                                        data-att-date="{{ $val }}" data-emp-id="{{ $employee->id }}"
                                                        data-emp-name="{{ $employee->name }}" data-toggle="modal"
                                                        data-target="#attendance_info_in">
                                                        <i class="fa fa-check {{ $isHoliday ? 'holiday-present' : 'text-success' }}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            title="{{ $employee->name . ' ' . $val }} {{ $isHoliday ? '(Holiday Work)' : '' }}"></i>
                                                    </a>
                                                </td>
                                            @else
                                                <td class="{{ $isHoliday ? 'holiday-bg' : '' }}">
                                                    @if($isHoliday)
                                                        <a href="javascript:void(0);" class="view-holiday-details"
                                                            data-date="{{ $val }}" 
                                                            data-toggle="modal" data-target="#holiday_info_modal">
                                                            <i class="fa fa-star holiday-icon" data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Holiday: {{ $holidayInfo->title ?? $val }}"></i>
                                                        </a>
                                                    @else
                                                        <a href="javascript:void(0);" class="view-attendance-details"
                                                            data-att-date="{{ $val }}" data-emp-id="{{ $employee->id }}"
                                                            data-emp-name="{{ $employee->name }}" data-status="absent"
                                                            data-toggle="modal" data-target="#attendance_info_in">
                                                            <i class="fa fa-times text-danger" data-toggle="tooltip"
                                                                data-placement="top" title="{{ $employee->name . ' ' . $val }}"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        {{ $result->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

        </div>
    </div>


    <x-admin.modals.employee-attendance-update-modal :leave-types="$leaveTypes" />

    <!-- Holiday Info Modal -->
    <div id="holiday_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Holiday Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="mb-3">
                        <i class="fa fa-calendar-check-o text-warning" style="font-size: 3rem;"></i>
                    </div>
                    <h4 class="holiday-title mb-1">---</h4>
                    <p class="text-muted holiday-date">---</p>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <p class="mb-0 text-muted">Type</p>
                            <h5 class="holiday-type">---</h5>
                        </div>
                        <div class="col-6">
                            <p class="mb-0 text-muted">Status</p>
                            <h5 class="holiday-paid">---</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- JS Dependencies -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Helper Functions
    // Helper Functions using Fetch for better compatibility
    async function dynamicAjax(url, method, data, callback) {
        try {
            const response = await fetch(url, {
                method: method,
                body: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            });
            const result = await response.json();
            if (typeof window[callback] === "function") {
                window[callback](result);
            }
        } catch (error) {
            console.error('Fetch Error:', error);
            makeToastr('error', 'Something went wrong', 'Error');
        }
    }

    function makeToastr(type, message, title) {
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
        };
        toastr[type](message, title);
    }

    $(function () {
        $('.select2').select2();

        $(".custom-table").DataTable({
            dom: "Bfrtip",
            buttons: [{
                extend: "excelHtml5",
                className: "btn btn-danger",
                exportOptions: {
                    orthogonal: "myExport",
                    columns: [0, 1, 2]
                },
            },
            {
                extend: "csvHtml5",
                className: "btn btn-secondary",
                exportOptions: {
                    columns: [0, 1, 2]
                },
            },
            {
                extend: "pdfHtml5",
                className: "btn btn-info",
                exportOptions: {
                    columns: [0, 1, 2]
                },
            },
            ],
        });
    });


    function toggleAttendanceFields(status) {
        if (!status) {
            status = $('input[name="attendance_status"]:checked').val();
        }

        if (status === 'present') {
            $('.present-content').show();
            $('.absent-content').hide();
            $('.punch-btn-section').show();

            $('input[name="punch_in_time"]').prop('disabled', false);
            $('input[name="punch_out_time"]').prop('disabled', false);

            $('select[name="leave_type_id"]').prop('disabled', true);
            $('textarea[name="remarks"]').prop('disabled', true);
        } else if (status === 'absent') {
            $('.present-content').hide();
            $('.absent-content').show();
            $('.punch-btn-section').show();

            $('input[name="punch_in_time"]').prop('disabled', true);
            $('input[name="punch_out_time"]').prop('disabled', true);

            $('select[name="leave_type_id"]').prop('disabled', false);
            $('textarea[name="remarks"]').prop('disabled', false);
        } else {
            $('.present-content').hide();
            $('.absent-content').hide();
            $('.punch-btn-section').hide();
        }
    }

    function timeDiffCalc(dateFuture, dateNow) {
        let diffInMilliSeconds = Math.abs(dateFuture - dateNow) / 1000;

        // calculate days
        const days = Math.floor(diffInMilliSeconds / 86400);
        diffInMilliSeconds -= days * 86400;
        console.log('calculated days', days);

        // calculate hours
        const hours = Math.floor(diffInMilliSeconds / 3600) % 24;
        diffInMilliSeconds -= hours * 3600;
        console.log('calculated hours', hours);

        // calculate minutes
        const minutes = Math.floor(diffInMilliSeconds / 60) % 60;
        diffInMilliSeconds -= minutes * 60;
        console.log('minutes', minutes);

        let difference = '';
        if (days > 0) {
            difference += (days === 1) ? `${days} day, ` : `${days} days, `;
        }

        difference += (hours === 0 || hours === 1) ? `${hours} : ` : `${hours} : `;

        difference += (minutes === 0 || hours === 1) ? `${minutes} hrs` : `${minutes} hrs`;

        return difference;
    }

    $(document).on("click", ".view-attendance-details", function (e) {
        var $this = $(this);
        var modal = $("#attendance_info_in");

        // Reset views
        modal.find(".li-html").html('');
        modal.find(".punch-in-time").html('NA');
        modal.find(".punch-out-time").html('NA');
        modal.find(".working-hours").html('0:00 hrs');

        // Clear previous inputs
        modal.find('input[type="time"]').val('');
        modal.find('select').val('');
        modal.find('textarea').val('');

        var employeeId = $this.attr('data-emp-id') || $this.data('emp-id');
        var date = $this.attr('data-att-date') || $this.data('att-date');
        var name = $this.attr('data-emp-name') || $this.data('emp-name');

        console.log("Attendance Modal Open - Date:", date, "Employee:", employeeId);

        // Reset radio selection - Force Choice Flow
        modal.find('input[name="attendance_status"]').prop('checked', false);
        modal.find('.btn-group-toggle label').removeClass('active');
        toggleAttendanceFields(''); // Hide content areas initially

        $("#att_date_in").val(date);
        $("#att_user_in").val(employeeId);
        modal.find(".att-info").html('Attendance Info of ' + name + ' <small class="text-muted">(' + date + ')</small>');
        modal.find(".day").text(date);

        var formData = new FormData();
        formData.append('id', employeeId);
        formData.append('date', date);

        // Reset Status Badge
        modal.find('.current-status-text').text("Checking...").removeClass('badge-success badge-danger').addClass('badge-light');

        dynamicAjax('{{ route('api.employee.attendance.get-attendance') }}', "POST", formData,
            'attendanceReceived');
    });

    function attendanceReceived(data) {
        console.log("Attendance Data Received:", data);
        var modal = $("#attendance_info_in");
        var statusBadge = modal.find('.current-status-text');

        if (data.status) {
            // Update Status Badge
            let statusText = data.status.charAt(0).toUpperCase() + data.status.slice(1);
            statusBadge.text("Current Status: " + statusText);
            statusBadge.removeClass('badge-light').addClass(data.status === 'present' ? 'badge-success' : 'badge-danger');

            // Set radio button status
            let statusToSelect = (data.status === 'leave' || data.status === 'absent') ? 'absent' : 'present';
            let radioBtn = modal.find('input[name="attendance_status"][value="' + statusToSelect + '"]');

            radioBtn.prop('checked', true);
            modal.find('.btn-group-toggle label').removeClass('active');
            radioBtn.parent().addClass('active');

            // Show corresponding content fields
            toggleAttendanceFields(statusToSelect);

            // Pre-fill inputs
            if (statusToSelect === 'present') {
                if (data.check_in) modal.find('input[name="punch_in_time"]').val(data.check_in.substring(0, 5));
                if (data.check_out) modal.find('input[name="punch_out_time"]').val(data.check_out.substring(0, 5));
            } else {
                modal.find('textarea[name="remarks"]').val(data.notes);
                if (data.leave_type_id) {
                    modal.find('select[name="leave_type_id"]').val(data.leave_type_id);
                }
            }
        } else {
            statusBadge.text("New Record").addClass('badge-light').removeClass('badge-success badge-danger');
        }

        // Process Activity / Punches
        let punches = data.punches || [];
        if (punches.length > 0) {
            let punchIn = punches[0].attendance;
            let punchOut = punches[punches.length - 1].attendance;
            modal.find(".working-hours").html(timeDiffCalc(new Date(punchOut), new Date(punchIn)));
            modal.find(".punch-in-time").html(punches[0].time);
            modal.find(".punch-out-time").html(punches[punches.length - 1].time);

            punches.forEach(element => {
                modal.find(".li-html").append(
                    '<li><p class="mb-0">Punch at</p><p class="res-activity-time d-inline-block">' +
                    '<i class="fa fa-clock-o mr-2"></i>' + element.time +
                    '</p><i data-punchid="' + element.id +
                    '" class="fa fa-trash bx-tada pull-right mr-4 delete-punch"></i></li>'
                );
            });
        }
    }

    $(document).on("submit", ".employeeAttendanceUpdateForm", async function (e) {
        e.preventDefault();
        var form = $(this);
        if (form.valid()) {
            makeToastr("info", "Please wait for response...", "Request sent");

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
                    makeToastr("success", result.message || "Attendance updated", "Success");
                    setTimeout(() => location.reload(), 1500);
                } else {
                    makeToastr("error", result.message || "Action failed", "Error");
                }
            } catch (error) {
                console.error('Submit Error:', error);
                makeToastr("error", "Network or server error", "Error");
            }
        };
    });

    $("#adminEmployeeAttendance").submit(function (e) {
        e.preventDefault();
        if ($(this).valid()) {
            $(this).find("button").prop('disabled', true);
            this.submit()
        };
    });

    $("body").on("click", ".delete-punch", function (e) {
        e.preventDefault();
        let punchId = $(this).data('punchid');
        Swal.fire({
            title: "Are you sure to delete ?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-outline-danger ms-1",
            },
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                let formData = new FormData();
                formData.append('id', punchId);
                dynamicAjax('{{ route('dashboard.delete-punch') }}', "POST", formData,
                    'ddCallBack')
            }
        });
    });

    function ddCallBack(response) {
        if (response.message == 'success') {
            makeToastr("success", response.response, "Success messsage 😒");
            location.reload();
        } else {
            $(".eror").html(response.responseJSON.response);
        }
    }

    $("body").on("click", ".view-holiday-details", async function (e) {
        let date = $(this).data('date');
        let modal = $('#holiday_info_modal');

        // Reset to loading state
        modal.find('.holiday-title').text('Loading...');
        modal.find('.holiday-date').text(date);
        modal.find('.holiday-type').text('...');
        modal.find('.holiday-paid').text('...');

        try {
            const response = await fetch(`{{ route('dashboard.holidays.get-detail') }}?date=${date}`, {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (result.success) {
                modal.find('.holiday-title').text(result.data.title);
                modal.find('.holiday-date').text(result.data.date);
                modal.find('.holiday-type').text(result.data.type.charAt(0).toUpperCase() + result.data.type.slice(1));
                modal.find('.holiday-paid').text(result.data.is_paid + ' Holiday');
            } else {
                modal.find('.holiday-title').text('Error: ' + (result.message || 'Unknown error'));
            }
        } catch (error) {
            console.error('Holiday Fetch Error:', error);
            modal.find('.holiday-title').text('Server Error');
        }
    });
</script>

@include('layouts.footer')