<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Report</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <!-- jQuery + DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Buttons -->
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
</head>

<body>

<div class="container-fluid mt-4">

    <!-- HEADER SAME STYLE -->
    <div class="row">
        <div class="col-lg-2">
            <img src="https://piffersoftware.com/images/piffer-logo1.png" style="max-height: 80px;">
        </div>

        <div class="col-lg-8 text-center mt-3">
            <h2 style="font-family: Stencil;">CLIENT REPORT</h2>
        </div>

        <div class="col-lg-2 text-end">
            <img src="{{ asset('reports/LOGO-removebg-preview.jpg') }}" style="max-height: 80px;">
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="card mt-3">
        <div class="card-body">

            <table id="clientReportTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Branch Category</th>
                        <th>Branch Ptcl No</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>
                            <span class="badge 
                                {{ $client->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($client->status) }}
                            </span>
                        </td>
                        <td>{{ $client->branch_category }}</td>
                        <td>{{ $client->branch_ptcl }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- DATATABLE SCRIPT -->
<script>
$(document).ready(function () {
    $('#clientReportTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf',
            {
                extend: 'print',
                title: '',
                messageTop: '<h3 class="text-center">Client Report</h3>',
                customize: function (win) {
                    $(win.document.body).css('font-size', '14pt');
                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
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