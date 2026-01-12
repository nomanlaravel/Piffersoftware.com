<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Log Sheet</title>

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
        <div class="row align-items-center">
            <div class="col-md-2">
                <img src="{{ asset('https://piffersoftware.com/images/piffer-logo1.png') }}" alt="PSS Logo" class="img-fluid position-end" style="max-height: 80px;">
            </div>
            <div class="col-md-10">
                <h1 class="mb-0" style="font-family: Stencil; font-size: 3rem;">PIFFERS SECURITY SERVICES (PVT.) LTD</h1>
            </div>
            <h2 class="text-center" style="font-family: Stencil; font-size: 1.98rem; text-decoration: underline;">NOTICE LOG SHEET - {{ \Carbon\Carbon::now()->format('d F Y') }}</h2>
        </div>
        <div class="mb-3">
            <button id="exportPdfBtn" class="btn btn-danger btn-sm">Export as PDF</button>
            <button id="exportExcelBtn" class="btn btn-success btn-sm">Export as Excel</button>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered" id="taskRecordTable">

                <thead>
            <tr>
                <th>Sr.No</th>
                <th>Regulator Name</th>
                <th>Date of Notice</th>
                <th>Notice Received On</th>
                <th>Reporting/Hearing Date</th>
                <th>Concern Department</th>
                <th>Reported to CRO HO</th>
                <th>Description</th>
            </tr>
                </thead>
                <tbody id="taskBody">
                    @if (isset($searchData))
                        @forelse ($searchData as $index=>$data)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $data->regulator_name }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->notice_date)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->notice_received_on)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->reporting_date)->format('d M Y') }}</td>
                                <td>{{ $data->concern_department }}</td>
                                <td>{{ $data->reported_to_cro }}</td>
                                <td>{{ $data->notice_description }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="7" class="text-center">No Records Yet</td></tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</body>
<!-- jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

<!-- SheetJS (xlsx) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

<script>
    // Export to PDF
    document.getElementById("exportPdfBtn").addEventListener("click", function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.text("Task Record Dairy Report", 14, 10);

        // Convert HTML table to autoTable
        doc.autoTable({
            html: '#taskRecordTable', // ID of your table
            startY: 20,
            styles: { fontSize: 8 },
        });

        doc.save("task-record-dairy.pdf");
    });

    // Export to Excel
    document.getElementById("exportExcelBtn").addEventListener("click", function () {
        let data = [];
        const headers = [];
        const table = document.getElementById("taskRecordTable");

        // Get headers
        table.querySelectorAll("thead th").forEach(th => {
            headers.push(th.innerText);
        });
        data.push(headers);

        // Get rows
        table.querySelectorAll("tbody tr").forEach(row => {
            const rowData = [];
            row.querySelectorAll("td").forEach(td => {
                rowData.push(td.innerText);
            });
            data.push(rowData);
        });

        // Create workbook
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet(data);
        XLSX.utils.book_append_sheet(wb, ws, "TaskRecord");
        XLSX.writeFile(wb, "task-record-dairy.xlsx");
    });
</script>

</html>