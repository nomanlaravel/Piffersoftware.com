<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Nationwide Report Security Sedulous Profiles & Handbooks Report</title>

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
                Weekly Nationwide Report Security Sedulous Profiles & Handbooks Report
            </h3>

    <div class="card">
        <div class="card-body">
            <table id="analyticsTable" class="table table-bordered display nowrap" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th>Sr.No</th>
                        <th>Branch Name</th>
                        <th>Branch ID</th>
                        <th>GM/DGM Name</th>
                        <th>New profiles</th>
                        <th>Old profiles</th>
                        <th>Sedulous profiles</th>
                        <th>Handbooks</th>
                        <th>Key chains</th>
                        <th>Calenders</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nationwide as  $index=>$items)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ optional($items->admin)->branch_office_name }}</td>
                        <td>{{ $items->branch_id }}</td>
                        <td>{{ $items->admin->gm_name }}/{{ $items->admin->dgm_name }}</td>
                        <td>{{ $items->new_profiles }}</td>
                        <td>{{ $items->old_profiles }}</td>
                        <td>{{ $items->sedulous_profiles }}</td>
                        <td>{{ $items->handbooks }}</td>
                        <td>{{ $items->kay_chains }}</td>
                        <td>{{ $items->calenders }}</td>
                        <td>Updated: {{ $items->remarks }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="text-end">Grand Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ $total_new }}</td>
                        <td>{{ $total_old }}</td>
                        <td>{{ $total_sedulous }}</td>
                        <td>{{ $total_handbooks }}</td>
                        <td>{{ $total_kaychains }}</td>
                        <td>{{ $total_calenders }}</td>
                        <td></td>
                    </tr>
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
                    title: 'Weekly Nationwide Report Security Sedulous Profiles & Handbooks Report',
                    messageTop: 'Generated Report - Weekly Nationwide Report Security Sedulous Profiles & Handbooks Report',
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

