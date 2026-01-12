<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily New Clients Report By Regions ({{ \Carbon\Carbon::parse($filters['date_of_entry'])->format('d-M-Y') }})
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
        Daily New Clients Report
    </h2>

    <table id="clientReportTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>SR.NO</th>
                <th>Client Name</th>
                <th>Customer ID</th>
                <th>EOBI</th>
                <th>Social Security</th>
                <th>GLI</th>
                <th>Development Date</th>
                <th>Region</th>
                <th>Poc</th>
                <th>Name</th>
                <th>Poc Number </th>
                <th>Email</th>
                <th>Payment Type</th>
                <th>Strength</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $index => $customer)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $customer->customers_name }}</td>
                    <td>{{ $customer->customers_id }}</td>
                    <td>{{ $customer->eobi ? 'Yes' : 'Nill' }}</td>
                    <td>{{ $customer->social_security ? 'Yes' : 'Nill' }}</td>
                    <td>{{ $customer->grp_life_ins ? 'Yes' : 'Nill' }}</td>
                    <td>
                        {{-- {{ \Carbon\Carbon::parse($customer->date_of_entry)->format('d/M/Y') }} --}}
                        {{ \Carbon\Carbon::parse($customer->created_at)->format('d-M-Y') }}
                    </td>
                    <td>{{ $customer->customers_region }}</td>
                    <td>{{ $customer->poc_name ? 'Yes' : 'Nill' }}</td>
                    <td>{{ $customer->poc_name  }}</td>
                    <td>{{ $customer->poc_cell  }}</td>
                    <td>  {{ $customer->poc_email }}</td>
                    <td>{{ $customer->payment == 1 ? 'Cash' : ($customer->payment == 2 ? 'Cheque' : 'Other') }}</td>
                    <td>1 x Guard
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
                    messageTop: '<h2 class="text-center">Daily New Clients Report ({{ \Carbon\Carbon::parse($filters["date_of_entry"])->format("d-M-Y") }})</h2>',
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
