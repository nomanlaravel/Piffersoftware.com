<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Files Report Nationwide
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
</head>
<body>
<div class="container-fluid mt-4">
<h2 class="text-center text-light bg-dark py-2">
Files Report Nationwide
</h2>
<div class="card">
    <div class="card-body">
     <table id="clientReportTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Location</th>
                <th>Customers Files</th>
                <th>Sedulous Files</th>
                <th>Training  Files</th>
                <th>Guard Files</th>
                <th>Score Card</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compaigns as $index => $compaign)
                <tr>

                    <td>{{ $compaign->region }}</td>
                    <td>{{ $compaign->customer_files }}</td>
                    <td>{{ $compaign->sedulous_files }}</td>
                    <td>{{ $compaign->training_files }}</td>
                    <td>{{ $compaign->guard_files }}</td>
                    <td>{{ $compaign->score_card }}</td>
                    <td>Update: {{ \Carbon\Carbon::parse($compaign->updated_at)->format('d-M-Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
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
                    messageTop: '<h2 class="text-center">Files Report Nationwide</h2>',
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
