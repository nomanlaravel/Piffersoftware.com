<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active RFQ/Tender Register for PIFFERS Security</title>

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
                Active RFQ/Tender Register for PIFFERS Security - {{ \Carbon\Carbon::now()->format('F Y') }}
            </h3>

    <div class="card">
        <div class="card-body">
            <table id="analyticsTable" class="table table-bordered display nowrap" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th>Tender/RFQ No</th>
                    <th>Organization Name</th>
                    <th>Pre Bid Meeting Date</th>
                    <th>E Portal Login & Testing</th>
                    <th>Price of Trader</th>

                    <th>Area of Development</th>
                    <th>Assigned to</th>
                    <th>Submission Date</th>
                    <th>Submission Mode</th>
                    <th>Opening Time</th>
                    <th>Submission Time</th>
                    <th>Internal Deadline</th>
                    <th>Bid Money</th>
                    <th>Response</th>
                    <th>REMARKS</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($requirements as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->orgName }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ $item->lis_of_give }}</td>
                    <td>{{ $item->leadBy }}</td>
                    <td>{{ $item->rhq }}</td>
                    <td>{{ $item->branch_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</td>
                    <td>{{ $item->leadAssignedToName }}</td>
                    <td>{{ $item->leadAssignedToEmail }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('h:i A') }}</td>
                    <td>{{ $item->typeLead }}</td>
                    <td>{{ $item->srcLead }}</td>
                    <td>{{ $item->bidRemarks ?? 'will not submit' }}</td>
                    <td>{{ $item->location }}</td>
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
                    title: 'Weekly Nationwide Report',
                    messageTop: 'Generated Report - Weekly Nationwide Report',
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

