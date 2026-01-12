<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Of Site ID Report ({{ \Carbon\Carbon::parse($filters['date_of_entry'])->format('d-M-Y') }})
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
            <img src="{{asset('siteid.jpg')}}" alt="logo" width="100%" height="200px">
        </div>
    <h2 class="text-center text-light bg-dark py-2">
        Monthly Of Site ID Report ({{ \Carbon\Carbon::parse($filters['date_of_entry'])->format('d-M-Y') }})
    </h2>

     <div class="table-responsive">
            
    <table  id="clientReportTable" class="table table-bordered text-center align-middle">

    <thead>
        <tr style="background-color: rgb(152, 203, 247);">
            <th rowspan="2">Sr.No</th>
            <th rowspan="2">Name of Customer</th>
            <th rowspan="2">Customer Details </th>
            <th rowspan="2">Renewal Date </th>
            @foreach ([
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ] as $month)
                <th colspan="7">{{ $month }}</th>
            @endforeach
        </tr>
        <tr style="background-color: rgb(226, 241, 255);">
            @for ($i = 0; $i < 12; $i++)
                <th>Approved Strength</th>
                <th>Uniform Status</th>
                <th>Qty of Weapons</th>
                <th>Attendance %</th>
                <th>Trainer's Visit</th>
                <th>Armorer Visit</th>
                <th>Met Client</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $index => $customer)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    {{ $customer->customers_name }}</td>
                    <td>
                    <div >{{ $customer->customers_id }}</div>
                     <div>    {{ $customer->branch_name }}</div>
                    <div>
                        {{ $customer->phone }}
                    </div>
                    <div>
                        {{ $customer->poc_cell }}
                    </div>
                    <div>
                        {{ $customer->email }}
                    </div>
                </td>
                    <td>
                    {{ \Carbon\Carbon::parse($customer->updated_at)->format('d-M-Y') }}
                    
                </td>
                @for ($i = 0; $i < 12; $i++)
                    <td>{{ $customer->approved_strength[$i] ?? '' }}</td>
                    <td>{{ $customer->uniform_status[$i] ?? '' }}</td>
                    <td>{{ $customer->weapons_qty[$i] ?? '' }}</td>
                    <td>{{ $customer->attendance_percent[$i] ?? '' }}</td>
                    <td>{{ $customer->trainer_visit[$i] ?? '' }}</td>
                    <td>{{ $customer->armorer_visit[$i] ?? '' }}</td>
                    <td>{{ $customer->met_client[$i] ?? '' }}</td>
                @endfor
            </tr>
        @endforeach
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
                    messageTop: '<h2 class="text-center">Monthly Of Site ID Report ({{ \Carbon\Carbon::parse($filters["date_of_entry"])->format("d-M-Y") }})</h2>',
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
