<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Register Report</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
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
                Quotation Register Report - {{ \Carbon\Carbon::now()->format('F Y') }}
            </h3>

    <div class="card">
        <div class="card-body">
            <table id="analyticsTable" class="table table-bordered display nowrap" style="width:100%">
    <thead class="table-dark">
        <tr>
            <th>Sr.No</th>
            <th>Date</th>
            @foreach ($cros as $cro)
                <th>{{ $cro->name }}  ({{ $cro->region }})</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
@foreach ($quotationreport as $dateKey => $dailyReports)
<tr>
    <td>{{ $loop->iteration }}</td>

    @php
        $report = $dailyReports->first();
    @endphp

    <td>{{ \Carbon\Carbon::parse($dateKey)->format('d M Y') }}</td>

    @foreach ($cros as $cro)
        @php
            $report = $dailyReports->first(function ($r) use ($cro) {
                return $r->cro_id == $cro->id && !empty($r->attachment);
            });
        @endphp

        <td>
            @if ($report)
                <a href="{{ asset($report->attachment) }}" target="_blank"
                   class="bg-success text-white text-decoration-none p-1 rounded">
                    <strong>Received</strong>
                </a>
            @else
                <strong class="bg-danger text-white text-decoration-none p-1 rounded">
                    Not Received
                </strong>
            @endif
        </td>
    @endforeach

</tr>
@endforeach


    </tbody>
</table>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#analyticsTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5',
                {
                    extend: 'print',
                    title: 'Sales Register Report',
                    messageTop: 'Generated Report - Sales Register Report',
                    customize: function (win) {
                        $(win.document.body).css('font-size', '12pt');
                        $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                    }
                }
            ],
            scrollX: true,
            paging: false,
            info: false,
            searching: false,
        });
    });
</script>
</body>
</html>

