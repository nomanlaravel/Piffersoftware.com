
@include('layouts.header')

@yield('main')

<link rel="stylesheet" href="css/mBox.css">

<style>
    #exportableTable th,
    #exportableTable td {
        white-space: nowrap !important;
        padding: 8px;
        text-align: center;
        border: 1px solid #000;
    }

    .branch-first-row {
        font-weight: bold;
    }

    .gm-header {
        background-color: black !important;
        color: white !important;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .export-buttons {
        margin-bottom: 10px;
    }

    .btn {
        padding: 5px 10px;
        cursor: pointer;
    }
</style>

@include('headerlogout')

<div class="customer_form">
    <div class="">
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Daily Parade State PIFFERS Security Date: {{ request('report_date') ?? date('d-M-Y') }}</h5>
                <div id="export-buttons-exportableTable" class="export-buttons"></div>
            </div>
            <div class="card-body table-responsive">
                <table id="exportableTable" class="table table-bordered table-hover">

                    <thead class="table-dark text-center">
                        <tr>
                            <th>Branch Name</th>
                            <th>Branch ID</th>
                            <th>Client Name</th>
                            <th>Client ID</th>
                            <th>GM Name</th>
                            <th>DGM Name</th>
                            <th>CRO Name</th>
                            <th>Category Admin</th>
                            <th>Category Foundry</th>
                            <th>Category Stores</th>
                            <th>Category Production Engg</th>
                            <th>Category After Market</th>
                            <th>Category Production</th>
                            <th>Category Allied Staff</th>
                            <th>Category Peons</th>
                            <th>Total=</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totalSum = 0; @endphp
                        @foreach($results as $branch)
                            @if($branch->reports->count())
                                <tr class="gm-header">
                                    <td colspan="17"><strong class="text-light">{{ $branch->branch_office_name }}</strong></td>
                                </tr>
                                @foreach($branch->reports as $index => $report)
                                    @php
                                        $army = is_numeric($report->army) ? (int)$report->army : 0;
                                        $civil = is_numeric($report->civil) ? (int)$report->civil : 0;
                                        $rowTotal = $army + $civil;
                                        $totalSum += $rowTotal;
                                    @endphp
                                    <tr class="{{ $index === 0 ? 'branch-first-row' : '' }}">
                                        <td>{{ $branch->branch_office_name }}</td>
                                        <td>{{ $branch->branch_id }}</td>
                                        <td>{{ $branch->branch_office_no }}</td>
                                        <td>{{ $branch->army }}</td>
                                        <td>{{ $branch->gm_name }}</td>
                                        <td>{{ $branch->dgm_name }}</td>
                                        <td>{{ $branch->cro_name }}</td>
                                        <td>{{ $report->army }}</td>
                                        <td>{{ $report->civil }}</td>
                                        <td>{{ $report->army }}</td>
                                        <td>{{ $report->civil }}</td>
                                        <td>{{ $report->civil }}</td>
                                        <td>{{ $report->civil }}</td>
                                        <td>{{ $report->civil }}</td>
                                        <td>{{ $report->civil }}</td>
                                        <td>{{ $rowTotal }}</td>
                                        <td>{{ $rowTotal }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                        <tr class="gm-header">
                            <td colspan="17"><strong class="text-light">TOTAL</strong></td>
                        </tr>
                        <tr>
                            <td colspan="15"></td>
                            <td>Total=</td>
                            <td>{{ $totalSum }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function setupExportButtons(tableId) {
        const table = document.getElementById(tableId);
        if (!table) return;

        const buttonWrapper = document.getElementById("export-buttons-" + tableId);
        if (buttonWrapper && buttonWrapper.childElementCount > 0) return;

        const targetWrapper = buttonWrapper || document.createElement("div");
        targetWrapper.className = "export-buttons mb-3";
        targetWrapper.id = "export-buttons-" + tableId;

        targetWrapper.innerHTML = `
            <button class="btn me-2" onclick="exportToPDF('${tableId}')">
                <img src="https://cdn-icons-png.flaticon.com/128/4726/4726010.png" width="30" height="30" />
            </button>
            <button class="btn me-2" onclick="exportToExcel('${tableId}')">
                <img src="https://cdn-icons-png.flaticon.com/128/4726/4726040.png" width="30" height="30" />
            </button>
            <button class="btn" onclick="exportToWord('${tableId}')">
                <img src="https://cdn-icons-png.flaticon.com/128/4725/4725970.png" width="30" height="30" />
            </button>
        `;

        if (!buttonWrapper) {
            table.parentElement.insertBefore(targetWrapper, table);
        }
    }

    async function exportToPDF(tableId) {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('l', 'pt', 'a2', true);
        const table = document.getElementById(tableId);

        doc.autoTable({
            html: "#" + tableId,
            styles: {
                overflow: 'visible',
                cellWidth: 'wrap',
                minCellWidth: 40,
                halign: 'center',
                fontSize: 8
            },
            margin: { top: 20 },
            theme: 'grid',
        didParseCell: function (data) {
            const row = data.cell.raw.parentElement;
            if (row && row.classList.contains("gm-header")) {
                data.cell.styles.fontStyle = 'bold';
                data.cell.styles.fontSize = 12;
            }
}

        });
    doc.save("report.pdf");
    }

    function exportToExcel(tableId) {
    const table = document.getElementById(tableId);
    const wb = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });

    const ws = wb.Sheets["Sheet1"];

    // Set column widths
    const colWidths = [];
    for (let col = 0; col < 17; col++) {
        colWidths[col] = { wch: 30 };
    }
    ws['!cols'] = colWidths;

    // Loop over all cells
    for (let cell in ws) {
        if (ws.hasOwnProperty(cell) && cell[0] !== '!') {
            // Cell style object init
            if (!ws[cell].s) ws[cell].s = {};

            // Set alignment for all cells
            ws[cell].s.alignment = {
                wrapText: true,
                vertical: 'center',
                horizontal: 'center'
            };

            // Extract row index from cell name (e.g., A2 -> 1)
            const rowIndex = parseInt(cell.match(/\d+/)[0]) - 1;
            const row = table.rows[rowIndex];

            // Apply styles if row has class 'gm-header'
            if (row && row.classList.contains('gm-header')) {
                ws[cell].s.fill = {
                    fgColor: { rgb: "000000" }  // black background
                };
                ws[cell].s.font = {
                    color: { rgb: "FFFFFF" },  // white text
                    bold: true,
                    sz: 14                     // font size
                };
            }
        }
    }

    // Export file
    XLSX.writeFile(wb, "report.xlsx", { cellStyles: true });
}

    function exportToWord(tableId) {
        const table = document.getElementById(tableId);
        let html = `
            <html xmlns:o='urn:schemas-microsoft-com:office:office'
                  xmlns:w='urn:schemas-microsoft-com:office:word'
                  xmlns='http://www.w3.org/TR/REC-html40'>
            <head><meta charset='utf-8'><title>Export HTML To Word</title></head><body>`;
        html += table.outerHTML;
        html += "</body></html>";

        const blob = new Blob(['\ufeff', html], { type: 'application/msword' });
        saveAs(blob, 'report.doc');
    }

    document.addEventListener("DOMContentLoaded", () => {
        setupExportButtons("exportableTable");
    });
</script>

@include('layouts.footer')
