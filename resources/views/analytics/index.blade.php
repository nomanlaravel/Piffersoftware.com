<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Accounts Reporting</title>

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
            Social Media Accounts Reporting
        </h2>
        <div class="card">
            <div class="card-body">
                <table id="analyticsTable" class="table table-bordered display nowrap" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>LinkedIn</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Instagram</th>
                        </tr>
                    </thead>
                    <tbody>
    @forelse($analytics as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->date ?? 'N/A' }}</td>
            <td>Details of Like, Comment & Subscribers</td>

            <td>
                Morning Post - {{ $item->linkedin_morning_post }}<br>
                Why PIFFERS - {{ $item->linkedin_why_pifra }}<br>
                What we do - {{ $item->linkedin_what_we_do }}<br>
                What we do video - {{ $item->linkedin_what_we_do_vedio }}<br>
                Subscribers - {{ $item->linkedin_subscribers }}<br>
                Comments - {{ $item->linkedin_comments }}
            </td>

            <td>
                Morning Post - {{ $item->facebook_morning_post }}<br>
                Why PIFFERS - {{ $item->facebook_why_pifra }}<br>
                What we do - {{ $item->facebook_what_we_do }}<br>
                What we do video - {{ $item->facebook_what_we_do_vedio }}<br>
                Subscribers - {{ $item->facebook_subscribers }}<br>
                Comments - {{ $item->facebook_comments }}
            </td>

            <td>
                Morning Post - {{ $item->twitter_morning_post }}<br>
                Why PIFFERS - {{ $item->twitter_why_pifra }}<br>
                What we do - {{ $item->twitter_what_we_do }}<br>
                What we do video - {{ $item->twitter_what_we_do_vedio }}<br>
                Subscribers - {{ $item->twitter_subscribers }}<br>
                Comments - {{ $item->twitter_comments }}
            </td>

            <td>
                Morning Post - {{ $item->instagram_morning_post }}<br>
                Why PIFFERS - {{ $item->instagram_why_pifra }}<br>
                What we do - {{ $item->instagram_what_we_do }}<br>
                What we do video - {{ $item->instagram_what_we_do_vedio }}<br>
                Subscribers - {{ $item->instagram_subscribers }}<br>
                Comments - {{ $item->instagram_comments }}
            </td>
        </tr>

    @empty
        <tr>
            <td colspan="7" class="text-center text-danger">
                No data available
            </td>
        </tr>
    @endforelse
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
                        title: 'Social Media Accounts Reporting',
                        messageTop: 'Generated Report - Social Media Accounts Reporting',
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

    {{-- Laravel Pagination Links --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $analytics->appends(request()->query())->links() }}
    </div>
</body>

</html>
