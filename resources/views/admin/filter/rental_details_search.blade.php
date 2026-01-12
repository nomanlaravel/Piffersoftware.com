
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>staff detail of your region in this register.
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
          <div class="row ">
            <div class="col-lg-2">
                <img src="https://piffersoftware.com/images/piffer-logo1.png" alt="Logo" style="max-height: 80px;">
            </div>
            <div class="col-lg-8 mt-3 text-center">
                <h1 class="mb-0" style="font-family: Stencil; font-size: 2rem;">LIST OF RENTAL PROPERTY</h1>
            </div>
            <div class="col-lg-2">
                <img src="{{ asset('reports/LOGO-removebg-preview.jpg') }}" alt="Logo" style="max-height: 80px;">
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="clientReportTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SR No </th>
                            <th>RP No</th>
                            <th>Owner Name</th>
                            <th>Owner Contact Number</th>
                            <th>Amount Security Deposit</th>
                            <th>Renewal Date</th>
                            <th>Page No.</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rentals as $index=>$rental )
                            <tr>
                            <td>{{ $index+1 }} </td>
                            <td>{{ $rental->rp_no }}</td>
                            <td>{{ $rental->owner_name }} </td>
                            <td>{{ $rental->owner_cell }}</td>
                            <td>{{ $rental->amount_advance }}</td>
                            <td>{{ $rental->voucher_no }}</td>
                            <td>{{ $rental->rental_number }}</td>
                            <td>{{ $rental->type }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- <div id="pagination" class="mt-3"></div> --}}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#clientReportTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf',
                    {
                        extend: 'print',
                        title: '',
                        messageTop: '<h2 class="text-center">Staff detail of your region in this register.</h2>',
                        customize: function(win) {
                            $(win.document.body).css('font-size', '20pt');
                            $(win.document.body).find('table').addClass('compact').css('font-size',
                                'inherit');
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


