<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Weekly Milleage Record
</title>
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

    <style>
        td{
            border: 1px solid #dee2e6 !important;
        }
    </style>
</head>
<body>
<div class="container mt-4">
        <div class="mb-4">

        </div>
            <h2 class="text-center text-light bg-dark py-2">
                Weekly Milleage Record
            </h2>

     <div class="table-responsive">

    <table  id="clientReportTable" class="table table-bordered text-center align-middle">

            <thead>
                <tr>
                    <th>Sr. No</th>
                    <th>Description</th>
                    <th>Registration Number</th>
                    <th>Engine Number</th>
                    <th>Chassis Number</th>
                    <th>Modal</th>
                    <th>Company Name</th>
                    <th>Color</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($milllagerecords) && count($milllagerecords) > 0)
                    @foreach ($milllagerecords as $record)
                        @foreach ($record->moveables as $index => $vehicle)
                            @if ($vehicle->vehicle_no)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>KM</td>
                                    <td>{{ now()->format('d/m/Y') }}</td> <!-- Current date: 01/08/2025 -->
                                    <td>{{ $vehicle->engine_no ?? 'N/A' }}</td>
                                    <td>{{ $vehicle->chasis_no ?? 'N/A' }}</td>
                                    <td>{{ $vehicle->vehicle_model ?? 'N/A' }}</td>
                                    <td>{{ $vehicle->vehicle_name ?? 'N/A' }}</td>
                                    <td>{{ $vehicle->vehicle_color ?? 'N/A' }}</td>
                                </tr>
                            @endif
                        @endforeach
                        @for ($i = 0; $i < 6; $i++)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>KM</td>
                                <td>{{ now()->format('d/m/Y') }}</td> <!-- Current date: 01/08/2025 -->
                                <td>KM</td>
                                <td>KM</td>
                                <td>KM</td>
                                <td>KM</td>
                                <td>KM</td>
                            </tr>
                        @endfor
                    @endforeach
                @else
                    @for ($i = 0; $i < 6; $i++)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>KM</td>
                            <td>{{ now()->format('d/m/Y') }}</td> <!-- Current date: 01/08/2025 -->
                            <td>KM</td>
                            <td>KM</td>
                            <td>KM</td>
                            <td>KM</td>
                            <td>KM</td>
                        </tr>
                    @endfor
                @endif
            </tbody>
        </table>
     </div>

</div>

<script>
    $(document).ready(function () {
        $('#clientReportTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf',
                {
                    extend: 'print',
                    title: '',
                    messageTop: '<h2 class="text-center">Monthly Of Site ID Report </h2>',
                    customize: function (win) {
                        $(win.document.body).css('font-size', '20pt');
                        $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                    }
                }
            ],
            paging: false,
            info: false,
            order: []
        });
    });
</script>
</body>
</html>
