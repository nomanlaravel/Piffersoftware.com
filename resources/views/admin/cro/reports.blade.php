@include('layouts.header') @yield('main')
<!--End of the Navbar-->
<div class="customer_form">
    <style>
        .nav-link {
            font-size: 15px;
            font-weight: bold
        }
    </style>

    <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>
    <div id="mySidebar" class="sidebar admin-setting"> <a href="javascript:void(0)" class="closebtn"
            onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>
    <!--Popup model for User new entry-->
    <!-- <div class="modal fade" id="add_user"> -->
    <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
    <!-- <div class="modal-content"> -->
    <div class="modal-header border-0">
        <div style="display:flex; column-gap:10px; align-items:center">
            <button type="button" class="btn btn-link" onclick="history.back()">
                <i class="bi bi-arrow-left"></i>
            </button>
            <h5 class="mt-3" style="font-weight: 700;">Cro Reports</h5>
        </div>
    </div>
    <!-- <div class="modal-body"> -->
    <section style="margin-bottom: 50px;">
        <ul class="nav nav-tabs mb-5" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                    type="button" role="tab" aria-controls="home" aria-selected="true">Sales Register
                    Report</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Quotation Register Report</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                    role="tab" aria-controls="contact" aria-selected="false">Feedback Register Report</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container-fluid">

                    <h3 class="text-center text-light bg-dark">Sales Register
                        Report-{{ \Carbon\Carbon::now()->format('d F Y') }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Select Start and End Date</th>
                                <th>{{ $cro->nme }}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="cro_id"
                                        value="{{ $cro->id }}" disabled>
                                    <input type="hidden" id="report_name" value="sales_register_report">
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <input type="date" id="startDate" class="form-control"
                                            placeholder="Start Date">
                                        <input type="date" id="endDate" class="form-control"
                                            placeholder="End Date">
                                    </div>
                                </td>
                                <td>
                                    <input type="file" id="dailyFile" class="form-control">
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-success" id="uploadButton">Upload Sales
                                        Report</button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                    <script>
                        document.getElementById('uploadButton').addEventListener('click', function() {
                            const fileInput = document.getElementById('dailyFile');
                            const startDateInput = document.getElementById('startDate');
                            const endDateInput = document.getElementById('endDate');
                            const croId = document.getElementById('cro_id').value;
                            const reportName = document.getElementById('report_name').value;

                            const file = fileInput.files[0];
                            const startDate = startDateInput.value;
                            const endDate = endDateInput.value;

                            if (!file || !startDate || !endDate) {
                                alert("Please select start date, end date and a file.");
                                return;
                            }

                            const formData = new FormData();
                            formData.append('cro_id', croId);
                            formData.append('start_date', startDate);
                            formData.append('end_date', endDate);
                            formData.append('report_name', reportName);
                            formData.append('attachment', file);

                            fetch("{{ route('sales.register.report') }}", {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    alert(data.message || 'File uploaded!');
                                    fileInput.value = '';
                                    startDateInput.value = '';
                                    endDateInput.value = '';
                                })
                                .catch(error => {
                                    console.error(error);
                                    alert('Failed to upload file.');
                                });
                        });
                    </script>
                    <table class="table table-bordered" id="salesReportTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>CRO Name</th>
                                <th>Attachment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salesreports as $index => $report)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>Start Date: {{ \Carbon\Carbon::parse($report->start_date)->format('d M Y') }}
                                        <br> End Date: {{ \Carbon\Carbon::parse($report->end_date)->format('d M Y') }}
                                    </td>

                                    <td>{{ $report->cro->name ?? '-' }}</td>
                                    <td>
                                        @if ($report->attachment)
                                            <div style="position: absolute; display: flex; ">
                                                <a href="{{ asset($report->attachment) }}" target="_blank">
                                                    <img src="{{ asset($report->attachment) }}" alt="Attachment"
                                                        style="border: 1px solid #ccc; border-radius: 4px;"
                                                        width="40" height="40">
                                                </a>
                                                <a href="{{ route('latestlicenseattachment', $report->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete this image?')"
                                                    style="position: relative; right:13px; background: red; color: white;
                                            font-weight: bold; border-radius: 50%; width: 20px; height: 20px;
                                            text-align: center; line-height: 18px; font-size: 14px; text-decoration: none;">
                                                    ×
                                                </a>
                                            </div>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('report.delete', $report->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container-fluid">
                    <h3 class="text-center text-light bg-dark">
                        Quotation Register Report - {{ \Carbon\Carbon::now()->format('d F Y') }}
                    </h3>


                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Select Date</th>
                                <th> {{ $cro->name }}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex gap-2">
                                        <input type="date" id="quotationstartDate" class="form-control"
                                            placeholder="Start Date">
                                        <input type="date" id="quotationendDate" class="form-control"
                                            placeholder="End Date">
                                    </div>

                                </td>
                                <td>
                                    <input type="file" id="quotationFile" class="form-control">
                                </td>
                                <td class="text-end">
                                    <input type="hidden" id="quotationCroId" value="{{ $cro->id }}">
                                    <input type="hidden" id="quotationReportName" value="quotation_register_report">
                                    <button type="button" class="btn btn-success" id="uploadQuotationButton">Upload
                                        Quotation</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered" id="quotationReportTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Cro Name</th>
                                <th>Attachment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotationReports as $index => $report)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>Start Date: {{ \Carbon\Carbon::parse($report->start_date)->format('d M Y') }}
                                        <br> End Date: {{ \Carbon\Carbon::parse($report->end_date)->format('d M Y') }}
                                    </td>
                                    <td>{{ $report->cro?->name }}</td>
                                    <td>
                                        @if ($report->attachment)
                                            <a href="{{ asset($report->attachment) }}" target="_blank">
                                                <img src="{{ asset($report->attachment) }}" width="40"
                                                    height="40" alt="file">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('report.delete', $report->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script>
                        document.getElementById('uploadQuotationButton').addEventListener('click', function() {
                            const fileInput = document.getElementById('quotationFile');
                            const qutestartDateInput = document.getElementById('quotationstartDate');
                            const quteendDateInput = document.getElementById('quotationendDate');
                            const croId = document.getElementById('quotationCroId').value;
                            const reportName = document.getElementById('quotationReportName').value;

                            const file = fileInput.files[0];
                            const qstartDate = qutestartDateInput.value;
                            const qendDate = quteendDateInput.value;

                            if (!file || !qstartDate || !qendDate) {
                                alert("Please select start date, end date and a file.");
                                return;
                            }

                            const formData = new FormData();
                            formData.append('cro_id', croId);
                            formData.append('start_date', qstartDate);
                            formData.append('end_date', qendDate);
                            formData.append('report_name', reportName);
                            formData.append('attachment', file);

                            fetch("{{ route('sales.register.report') }}", {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    alert(data.message || 'Quotation uploaded!');
                                    fileInput.value = '';
                                    qutestartDateInput.value = '';
                                    quteendDateInput.value = '';
                                    location.reload(); // Or update the table dynamically
                                })
                                .catch(error => {
                                    console.error(error);
                                    alert('Failed to upload quotation.');
                                });
                        });
                    </script>

                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="container-fluid">
                    <h3 class="text-center text-light bg-dark">Feedback Register Report -
                        {{ \Carbon\Carbon::now()->format('d F Y') }}</h3>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Select Date</th>
                                <th> {{ $cro->name }}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex gap-2">
                                        <input type="date" id="feedbackstartDate" class="form-control"
                                            placeholder="Start Date">
                                        <input type="date" id="feedbackendDate" class="form-control"
                                            placeholder="End Date">
                                    </div>

                                </td>
                                <td>
                                    <input type="file" id="feedbackFile" class="form-control">
                                </td>
                                <td class="text-end">
                                    <input type="hidden" id="feedbackcroId" value="{{ $cro->id }}">
                                    <input type="hidden" id="feedbackReportName" value="feedback_register_report">
                                    <button type="button" class="btn btn-success" id="uploadFeedbackButton">Upload
                                        Feedback</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered" id="feedbackReportTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>CRO Name</th>
                                <th>Attachment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedbackReports as $index => $report)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>Start Date: {{ \Carbon\Carbon::parse($report->start_date)->format('d M Y') }}
                                        <br> End Date: {{ \Carbon\Carbon::parse($report->end_date)->format('d M Y') }}
                                    </td>
                                    <td>{{ $report->cro?->name }}</td>
                                    <td>
                                        @if ($report->attachment)
                                            <a href="{{ asset($report->attachment) }}" target="_blank">
                                                <img src="{{ asset($report->attachment) }}" width="40"
                                                    height="40" alt="file">
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('report.delete', $report->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <script>
                    document.getElementById('uploadFeedbackButton').addEventListener('click', function() {
                        const fileInput = document.getElementById('feedbackFile');
                        const feedstartDateInput = document.getElementById('feedbackstartDate');
                        const feedendDateInput = document.getElementById('feedbackendDate');
                        const croId = document.getElementById('feedbackcroId').value;
                        const reportName = document.getElementById('feedbackReportName').value;


                        const file = fileInput.files[0];
                        const fstartDate = feedstartDateInput.value;
                        const fendDate = feedendDateInput.value;

                        if (!file || !fstartDate || !fendDate) {
                            alert("Please select start date, end date and a file.");
                            return;
                        }
                        const formData = new FormData();
                        formData.append('cro_id', croId);
                        formData.append('start_date', fstartDate);
                        formData.append('end_date', fendDate);
                        formData.append('report_name', reportName);
                        formData.append('attachment', file);

                        fetch("{{ route('sales.register.report') }}", {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                alert(data.message || 'Quotation uploaded!');
                                fileInput.value = '';
                                feedstartDateInput.value = '';
                                feedendDateInput.value = '';
                                location.reload(); // Or update the table dynamically
                            })
                            .catch(error => {
                                console.error(error);
                                alert('Failed to upload quotation.');
                            });
                    });
                </script>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-lg float-right">Submit</button>
    </section>
</div>
</div>
<!-- </div> -->
</div>
</div>

</body>

</html>
