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
</style>
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
                                    {{ $employee->first_name . ' ' . $employee->last_name }}
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
                                    <th>{{ \Carbon\Carbon::parse($item)->format('d') }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $employee)
                                <tr>
                                    <td>
                                        {{ $employee->name }}
                                    </td>
                                    <td>
                                        {{ 'TD / ' . count($monthDays) . ' / WD ' . $workingDays . ' / P ' . $employee->attendances->count() }}@php echo ' / A ' . (count($monthDays) - $employee->attendances->count() - ($satSuns['saturdays'] + $satSuns['sundays'])) . ' / SAT ' . $satSuns['saturdays'] . ' / SUN ' . $satSuns['sundays'] @endphp
                                    </td>
                                    @foreach ($monthDays as $attendance => $val)
                                        @php
                                            $dayAttendance = $employee->attendances->firstWhere('date', $val);
                                        @endphp
                                        @if ($dayAttendance)
                                            <td>
                                                <a href="javascript:void(0);" class="view-attendance-details" data-date="{{ $val }}"
                                                    data-employee="{{ $employee->id }}" data-name="{{ $employee->name }}"
                                                    data-toggle="modal" data-target="#attendance_info_in">
                                                    <i class="fa fa-check text-success" data-toggle="tooltip" data-placement="top"
                                                        title="{{ $employee->name . ' ' . $val }}"></i>
                                                </a>
                                            </td>
                                        @else
                                            <td>
                                                <a href="javascript:void(0);" class="view-attendance-details-absent"
                                                    data-date="{{ $val }}" data-employee="{{ $employee->id }}"
                                                    data-name="{{ $employee->name }}" data-toggle="modal"
                                                    data-target="#attendance_info_out">
                                                    <i class="fa fa-times text-danger" data-toggle="tooltip" data-placement="top"
                                                        title="{{ $employee->name . ' ' . $val }}"></i>
                                                </a>
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>


<x-admin.modals.employee-attendance-update-modal />
@endsection

@push('extended-js')
    <!-- JS Dependencies -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
        function dynamicAjax(url, method, data, callback) {
            $.ajax({
                url: url,
                type: method,
                data: data,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (typeof window[callback] === "function") {
                        window[callback](response);
                    }
                },
                error: function (error) {
                    console.error('Ajax Error:', error);
                    makeToastr('error', 'Something went wrong', 'Error');
                }
            });
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
        $(".employeeAttendanceUpdateForm").submit(function (e) {
            e.preventDefault();
            $(this).valid() ? true : false;
        });

        $(".view-attendance-details-absent").click(function (e) {
            $("[name=day_attendance]").val($(this).data('date'));
            $("[name=employee_id]").val($(this).data('employee'));
            $(".att-info").html('Attendance Info of ' + $(this).data('name'));
            $(".li-html-2").html(
                '<li><p class="mb-0">Punch at</p><p class="res-activity-time"><i class="fa fa-clock-o mr-2"></i>No details available</p></li>'
            )
        });

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

        $(".view-attendance-details").click(function (e) {
            e.preventDefault();
            $(".li-html").html('');
            $(".punch-in-time").html('NA');
            $(".punch-out-time").html('NA');
            $(".working-hours").html('0:00 hrs');
            var employeeId = $(this).data('employee');
            var date = $(this).data('date');
            var name = $(this).data('name');
            $("[name=day_attendance]").val(date);
            $("[name=employee_id]").val(employeeId);
            $(".att-info").html('Attendance Info of ' + name);
            var formData = new FormData();
            formData.append('id', employeeId);
            formData.append('date', date);

            dynamicAjax('{{ route('api.employee.attendance.get-attendance') }}', "POST", formData,
                'attendanceReceived')
        });

        function attendanceReceived(datedStampes) {
            console.log(datedStampes);
            if (datedStampes != undefined) {
                let punchIn = datedStampes[0].attendance;
                let punchOut = datedStampes[datedStampes.length - 1].attendance;
                $(".working-hours").html(timeDiffCalc(new Date(punchOut), new Date(punchIn)));
                $(".punch-in-time").html(datedStampes[0].time);
                $(".punch-out-time").html(datedStampes[datedStampes.length - 1].time);
                datedStampes.forEach(element => {
                    $(".li-html").append(
                        '<li><p class="mb-0">Punch at</p><p class="res-activity-time d-inline-block">' +
                        '<i class="fa fa-clock-o mr-2"></i>' + element.time +
                        '</p><i data-punchid="' + element.id +
                        '" class="fa fa-trash bx-tada pull-right mr-4 delete-punch"></i></li>'
                    )
                });
            }
        }

        $(".employeeAttendanceUpdateForm").submit(function (e) {
            e.preventDefault();
            if ($(this).valid()) {
                makeToastr("info", "Please wait for response...", "Request sent");
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: $(this).serializeArray(),
                    dataType: "json",
                    success: function (response) {
                        makeToastr("success", response, "Action Successful. 😃");
                    },
                    error: function (response) {
                        makeToastr("success", response, "Action failed. 😃");
                    }
                });
                // this.submit()
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
    </script>
@endpush