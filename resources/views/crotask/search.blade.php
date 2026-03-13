<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRO Daily Tasks</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- TableExport (Excel & Print only) -->
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
</head>
<body>
<div class="container-fluid mt-4">
    <h3 class="text-center text-light bg-secondary">PIFFERS Security Services</h3>
    <h3 class="text-center text-light bg-dark">
        CRO Daily Tasks <div>
<div class="mb-3">
    @if(request('date_range'))
        Date Range: {{ request('date_range') }}
    @elseif(request('month'))
        @php
            [$year, $month] = explode('-', request('month'));
            $monthName = \Carbon\Carbon::create($year, $month, 1)->format('F Y');
        @endphp
        <h5>Month: {{ $monthName }}</h5>
    @else
        <h5>Current Month Tasks</h5>
    @endif
</div>
</div>
    </h3>

    <button onclick="exportTableToExcel('croTaskTable')" class="btn btn-success mb-2">Export to Excel</button>
    {{-- <button onclick="window.print()" class="btn btn-primary mb-2">Print</button> --}}
    <div class="card">
        <div class="card-body">
            @if(isset($groups))
            <div class="table-responsive">
                <table id="croTaskTable" class="table table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr. #</th>
                            <th>Task Description</th>
                            @foreach (range(0, $totalDays - 1) as $i)
                                <th>{{ $startDate->copy()->addDays($i)->format('d') }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr class="table-secondary font-weight-bold">
                                <td>{{ $group->section_number }}</td>
                                <td colspan="{{ $totalDays + 1 }}">{{ $group->title }}</td>
                            </tr>
@foreach ($group->tasks as $task)
                                @php
                                    $hasAssignments = $task->assignments->isNotEmpty();
                                @endphp
                                @if($hasAssignments || !($branch && $branch != 'all'))
                                <tr>
                                    <td>{{ $task->task_number }}</td>
                                    <td class="text-nowrap">{{ $task->task_description }}</td>
                                    @foreach (range(0, $totalDays - 1) as $i)
                                        @php
                                            $date = $startDate->copy()->addDays($i)->toDateString();
                                            $assigned = $task->assignments->firstWhere('assigned_date', $date);
                                        @endphp
                                        <td>{!! $assigned && $assigned->is_assigned ? '<b class="text-success">✓</b>' : '<b class="text-danger">❌</b>' !!}</td>
                                    @endforeach
                                </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
function exportTableToExcel(tableID, filename = 'cro_tasks.xlsx') {
    const table = document.getElementById(tableID);
    const wb = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });

    // Get the first worksheet
    const ws = wb.Sheets["Sheet 1"];

    // Apply wrap text to second column (B) — from row 2 to last row
    const range = XLSX.utils.decode_range(ws['!ref']);
    for (let row = 1; row <= range.e.r; row++) {
        const cellAddress = { c: 1, r: row }; // Column B = index 1
        const cellRef = XLSX.utils.encode_cell(cellAddress);
        if (!ws[cellRef]) continue;
        if (!ws[cellRef].s) ws[cellRef].s = {};
        ws[cellRef].s.alignment = { wrapText: true };
    }

    // Define sheet styles
    wb.Sheets["Sheet 1"]["!cols"] = [
        { wch: 5 },  // Column A width
        { wch: 150 },  // Column B width (description)
    ];

    XLSX.writeFile(wb, filename);
}
</script>

</body>
</html>
