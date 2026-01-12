<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Register Report</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

   <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables Core -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

</head>

<body>
    <div class="container-fluid mt-4">
        <h3 class="text-center text-light bg-secondary ">PIFFERS Security Services</h3>
        <h3 class="text-center text-light bg-dark">
            Task Record Dairy - {{ \Carbon\Carbon::now()->format('F Y') }}
        </h3>
        {{-- <div class="mt-3 mb-4">
            <button id="exportPdf" class="btn btn-danger me-2">Export to PDF</button>
            <button id="exportExcel" class="btn btn-success">Export to Excel</button>
        </div> --}}
        <div class="table-responsive mt-4">
            <table class="table table-bordered" id="taskTable">
                <thead class="table-dark">
                    <tr>
                        <th>Sr No</th>
                        <th>Description Task</th>
                        <th>Dependence Department</th>
                        <th>Task Assigned By</th>
                        <th>Review Date</th>
                        <th>Completion Date</th>
                        <th>Signature</th>
                    </tr>
                </thead>
                <tbody id="taskBody">
                    @if(isset($data))
                        @forelse($data as $item)
                            <tr>
                                <td>{{ $item->sr_no }}</td>
                                <td>{{ $item->description_task }}</td>
                                <td>{{ $item->dependence_department_organization }}</td>
                                <td>{{ $item->task_assigned_by }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->review_date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->completion_date)->format('d M Y') }}</td>
                                <td>{{ $item->signature }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center">No records yet.</td></tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <script>
    document.getElementById('filterBtn').addEventListener('click', function () {
        let reviewDate = document.getElementById('review_date').value;
        let completionDate = document.getElementById('completion_date').value;

        fetch(`/search-task-record-dairy?review_date=${reviewDate}&completion_date=${completionDate}`)
            .then(response => response.json())
            .then(result => {
                let tbody = document.querySelector('#taskTable tbody');
                tbody.innerHTML = '';

                if (result.data.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="7" class="text-center">No records found.</td></tr>`;
                } else {
                    result.data.forEach((item, index) => {
                        tbody.innerHTML += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.description_task}</td>
                                <td>${item.dependence_department_organization}</td>
                                <td>${item.task_assigned_by}</td>
                                <td>${item.review_date ?? '-'}</td>
                                <td>${item.completion_date ?? '-'}</td>
                                <td>${item.signature ?? '-'}</td>
                            </tr>
                        `;
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
</script>
</body>
<script>
    let dataTable;

    function formatDate(dateStr) {
        if (!dateStr) return '-';
        const options = { year: 'numeric', month: 'short', day: 'numeric' };
        return new Date(dateStr).toLocaleDateString('en-US', options);
    }

    function initializeDataTable() {
        if ($.fn.dataTable.isDataTable('#taskTable')) {
            dataTable.destroy();
        }

        dataTable = $('#taskTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Task Record Dairy',
                    className: 'export-excel',
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Task Record Dairy',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    className: 'export-pdf',
                }
            ],
            ordering: false,
            searching: false,
            paging: false,
            info: false
        });
    }

    // Initialize DataTable on page load if data exists
    $(document).ready(function () {
        if ($('#taskTable tbody tr').length > 0) {
            initializeDataTable();
        }

        $('#filterBtn').on('click', function (e) {
            e.preventDefault();

            let reviewDate = $('#review_date').val();
            let completionDate = $('#completion_date').val();

            fetch(`/search-task-record-dairy?review_date=${reviewDate}&completion_date=${completionDate}`)
                .then(response => response.json())
                .then(result => {
                    let tbody = $('#taskTable tbody');
                    tbody.html('');

                    if (result.data.length === 0) {
                        tbody.html(`<tr><td colspan="7" class="text-center">No records found.</td></tr>`);
                    } else {
                        result.data.forEach((item, index) => {
                            tbody.append(`
                                <tr>
                                    <td>${item.sr_no}</td>
                                    <td>${item.description_task}</td>
                                    <td>${item.dependence_department_organization}</td>
                                    <td>${item.task_assigned_by}</td>
                                    <td>${formatDate(item.review_date)}</td>
                                    <td>${formatDate(item.completion_date)}</td>
                                    <td>${item.signature}</td>
                                </tr>
                            `);
                        });
                    }

                    initializeDataTable();
                });
        });

        // Trigger export buttons
        $('#exportPdf').on('click', function () {
            dataTable.button('.export-pdf').trigger();
        });

        $('#exportExcel').on('click', function () {
            dataTable.button('.export-excel').trigger();
        });
    });
</script>
</html>
