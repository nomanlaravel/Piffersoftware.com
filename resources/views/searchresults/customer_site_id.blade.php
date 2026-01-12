<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Of Site ID ({{ \Carbon\Carbon::parse($filters['date_of_entry'])->format('d-M-Y') }})
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
        <div class="mb-4">
            <img src="{{asset('siteid.jpg')}}" alt="logo" width="100%" height="200px">
        </div>
    <h2 class="text-center text-light bg-dark py-2">
        List Of Site ID ({{ \Carbon\Carbon::parse($filters['date_of_entry'])->format('d-M-Y') }})
    </h2>

    <table id="clientReportTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>SR.NO</th>
                <th>Client Name</th>
                <th>Client ID</th>
                <th>Site ID</th>
                <th>Page Number </th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $index => $customer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $customer->customers_name }}</td>
                    <td>{{ $customer->customers_id }}</td>
                    <td>{{ $customer->customers_region }}</td>
                    <td>{{ $customer->eobi ? 'Yes' : 'Nill' }}</td>
                    <td>
                        @if($customer->customers_activation_check==1)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
                    messageTop: '<h2 class="text-center">Daily List Of Site ID ({{ \Carbon\Carbon::parse($filters["date_of_entry"])->format("d-M-Y") }})</h2>',
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
