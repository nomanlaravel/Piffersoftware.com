<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <title>Rental Property Record</title>
</head>
<body>
    <div class="container-fluid mt-2">
        <div class="mb-4">
            <img src="{{asset('rentalbils.jpg')}}" alt="logo" width="100%" height="200px">
        </div>
        <div class="mb-3">
            <button id="exportPdfBtn" class="btn btn-danger btn-sm">Export as PDF</button>
            <button id="exportExcelBtn" class="btn btn-success btn-sm">Export as Excel</button>
        </div>
        @foreach($rentals as $index => $rental)
        <div class="table-responsive mb-5">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Sr No</th>
                        <th>R P No.</th>
                        <th>Rental Property Address</th>
                        <th>Owner Name</th>
                        <th>Owner Contact Number</th>
                        <th>Amount of Security Deposit</th>
                        <th>Renewal Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $rental->rp_no }}</td>
                        <td>{{ $rental->location }}</td>
                        <td>{{ $rental->owner_name }}</td>
                        <td>{{ $rental->owner_cell }}</td>
                        <td>{{ $rental->amount_advance ?? 'N/A' }}</td>
                        <td>{{ $rental->renewal_date ?? 'DD/MM/YY' }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- Custom 10-column data grid (5+5 columns) in 6 stacked rows --}}
            <table class="table table-bordered text-center align-middle">
                <tbody>
                    @for ($i = 0; $i < 6; $i++)
                        <tr>
                            {{-- Left Block --}}
                            <td>Insp</td>
                            <td>
                                @if ($rental->elec_attach)
                                    <a href="{{ asset($rental->elec_attach) }}" target="_blank">View Bill 📎</a>
                                @else
                                    <span class="text-muted">Pending</span>
                                @endif
                            </td>
                            <td>بجلی کا بل</td>
                            <td>
                                @if ($rental->last_bill)
                                    <a href="{{ asset($rental->last_bill) }}" target="_blank">View Bill 📎</a>
                                @else
                                    <span class="text-muted">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if ($rental->rental_pic)
                                    <a href="{{ asset($rental->rental_pic) }}" target="_blank">View Rent 📎</a>
                                @else
                                    <span class="text-muted">Pending</span>
                                @endif
                            </td>

                            {{-- Right Block (Same content again, for second side) --}}
                            <td>Insp</td>
                            <td>
                                @if ($rental->elec_attach)
                                    <a href="{{ asset($rental->elec_attach) }}" target="_blank">View Bill 📎</a>
                                @else
                                    <span class="text-muted">Pending</span>
                                @endif
                            </td>
                            <td>بجلی کا بل</td>
                            <td>
                                @if ($rental->last_bill)
                                    <a href="{{ asset($rental->last_bill) }}" target="_blank">View Bill 📎</a>
                                @else
                                    <span class="text-muted">Pending</span>
                                @endif
                            </td>
                            <td>
                                @if ($rental->rental_pic)
                                    <a href="{{ asset($rental->rental_pic) }}" target="_blank">View Rent 📎</a>
                                @else
                                    <span class="text-muted">Pending</span>
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>

        </div>
    @endforeach
    </div>

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
</body>
</html>
