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
            <div class="col-md-2">
                <img src="https://piffersoftware.com/images/piffer-logo1.png" alt="PSS Logo" class="img-fluid position-end"
                    style="max-height: 80px;">
            </div>
            <div class="col-md-10">
                <h1 class="mb-0" style="font-family: Stencil; font-size: 3rem;">
                    PIFFERS SECURITY SERVICES (PVT.) LTD</h1>
            </div>
            <h2 class="text-center" style="font-family: Stencil; font-size: 1.98rem;">
                STAFF DETAILS</h2>
            <h4 class="text-center">Please enter all staff detail of your region in this
                register.</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="clientReportTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sr No </th>
                            <th>Name</th>
                            <th>Father Name</th>
                            <th>CNIC</th>
                            <th>Employee Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hrms as $index=>$hrm )
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $hrm->name }}</td>
                                <td>{{ $hrm->fname }}</td>
                                <td>
                                {{-- Display for screen --}}
                                {{-- <div class="cnic-box d-print-none" style="display: flex; gap: 4px;">
                                    @foreach(str_split($hrm->cnic) as $char)
                                        <div style="width: 25px; height: 30px; border: 1px solid #ccc; text-align: center; line-height: 30px; border-radius: 4px;">
                                            {{ $char }}
                                        </div>
                                    @endforeach
                                </div> --}}

                                {{-- Hidden for screen, visible only in export --}}
                                <span class=" export-cnic">{{ $hrm->cnic }}</span>
                            </td>

                                <td>{{ $hrm->employee_no }}</td>
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
