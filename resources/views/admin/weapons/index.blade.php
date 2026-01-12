<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Weapon Record Report</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.bootstrap5.css">
    <!-- Custom CSS -->
    <style>
        .dt-buttons {
            margin-bottom: 15px;
        }
        .dt-button {
            margin-right: 5px;
            background-color: #007bff !important;
            color: white !important;
            border-radius: 4px;
            padding: 6px 12px;
        }
        .dt-button:hover {
            background-color: #0056b3 !important;
        }
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 15px;
        }
        table.dataTable thead th {
            background-color: #f8f9fa;
            vertical-align: middle;
        }
        .table-responsive {
            overflow-x: auto;
        }
       th{
         white-space: nowrap
        }
    </style>
</head>
<body>
    <div class="container mt-4">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Weakly Weapon Record</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Weakly Uniform Record</button>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        @if (auth()->check() && auth()->user()->role !== 'client')
            <div class="float-end mb-3">
                <a class="btn btn-primary btn-sm" href="{{ route('post.weakly.recordes') }}">
                    + New Record
                </a>
            </div>
        @endif
        <div class="row align-items-center">
            <div class="col-lg-2">
                <img src="https://piffersoftware.com/images/piffer-logo1.png" alt="Piffer Logo" style="max-height: 80px;">
            </div>
            <div class="col-lg-8 text-center">
                <h1 class="mb-0" style="font-family: 'Stencil', sans-serif; font-size: 2rem;">Weekly Weapon Record Report</h1>
            </div>
            <div class="col-lg-2">
                <img src="{{ asset('https://piffersoftware.com/images/piffer-logo1.png') }}" alt="Secondary Logo" style="max-height: 80px;">
            </div>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover" id="clientReportTable" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th colspan="2" class="text-center">Weekly Weapon Record</th>
                        <th colspan="6" class="text-center">12 Bore</th>
                        <th colspan="6" class="text-center">30 Bore</th>
                        <th colspan="6" class="text-center">9mm Pistol</th>
                        <th colspan="2" class="text-center">7mm Rifles</th>
                        <th colspan="2" class="text-center">222 Bore Rifle</th>
                        <th colspan="2" class="text-center">44 Bore Rifle</th>
                        <th colspan="2" class="text-center">223 Bore Rifle</th>
                        <th colspan="2" class="text-center">223 M4 Rifle</th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <th>Branch Name</th>
                        <th>Repeater</th>
                        <th>Body Guard</th>
                        <th>Wooden Body</th>
                        <th>G3 Style</th>
                        <th>Total Bullets</th>
                        <th>Total</th>
                        <th>7 Shots</th>
                        <th>14 Shots</th>
                        <th>MP-5</th>
                        <th>Kalakov</th>
                        <th>Total Bullets</th>
                        <th>Total</th>
                        <th>MP-5</th>
                        <th>Zagana</th>
                        <th>Breta</th>
                        <th>Glock</th>
                        <th>Total Bullets</th>
                        <th>Total</th>
                        <th>Standard</th>
                        <th>Total Bullets</th>
                        <th>Standard</th>
                        <th>Total Bullets</th>
                        <th>Standard</th>
                        <th>Total Bullets</th>
                        <th>Standard</th>
                        <th>Total Bullets</th>
                        <th>Standard</th>
                        <th>Total Bullets</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>{{ $record->date ?? 'N/A' }}</td>
                            <td>{{ $record->Wbranch->branch_office_name ?? 'N/A' }}</td>
                            <td>{{ $record->repeater ?? 'N/A' }}</td>
                            <td>{{ $record->body_guard ?? 'N/A' }}</td>
                            <td>{{ $record->wooden_body ?? 'N/A' }}</td>
                            <td>{{ $record->g3_style ?? 'N/A' }}</td>
                            <td>{{ $record->bore12_total_bullets ?? 'N/A' }}</td>
                            <td>{{ $record->bore12_total ?? 'N/A' }}</td>
                            <td>{{ $record->seven_shots ?? 'N/A' }}</td>
                            <td>{{ $record->fourteen_shots ?? 'N/A' }}</td>
                            <td>{{ $record->mp5 ?? 'N/A' }}</td>
                            <td>{{ $record->kalakov ?? 'N/A' }}</td>
                            <td>{{ $record->bore30_total_bullets ?? 'N/A' }}</td>
                            <td>{{ $record->bore30_total ?? 'N/A' }}</td>
                            <td>{{ $record->mp_5 ?? 'N/A' }}</td>
                            <td>{{ $record->zagana ?? 'N/A' }}</td>
                            <td>{{ $record->breta ?? 'N/A' }}</td>
                            <td>{{ $record->glock ?? 'N/A' }}</td>
                            <td>{{ $record->mm9_total_bullets ?? 'N/A' }}</td>
                            <td>{{ $record->mm9_total ?? 'N/A' }}</td>
                            <td>{{ $record->mm7_standard ?? 'N/A' }}</td>
                            <td>{{ $record->mm7_total_bullets ?? 'N/A' }}</td>
                            <td>{{ $record->rifle_222 ?? 'N/A' }}</td>
                            <td>{{ $record->rifle_222_bullets ?? 'N/A' }}</td>
                            <td>{{ $record->rifle_44 ?? 'N/A' }}</td>
                            <td>{{ $record->rifle_44_bullets ?? 'N/A' }}</td>
                            <td>{{ $record->rifle_223 ?? 'N/A' }}</td>
                            <td>{{ $record->rifle_223_bullets ?? 'N/A' }}</td>
                            <td>{{ $record->rifle_223_m4 ?? 'N/A' }}</td>
                            <td>{{ $record->rifle_223_m4_bullets ?? 'N/A' }}</td>
                        </tr>
                        @if (!$loop->last)
                            <tr>
                                <td colspan="30" class="bg-light"></td>
                            </tr>
                        @endif
                    @endforeach
                    <tr class="table-secondary">
                        <td colspan="2" class="text-center"><strong>Total of Branch</strong></td>
                        <td>{{ $totals['repeater'] ?? 'N/A' }}</td>
                        <td>{{ $totals['body_guard'] ?? 'N/A' }}</td>
                        <td>{{ $totals['wooden_body'] ?? 'N/A' }}</td>
                        <td>{{ $totals['g3_style'] ?? 'N/A' }}</td>
                        <td>{{ $totals['bore12_total_bullets'] ?? 'N/A' }}</td>
                        <td>{{ $totals['bore12_total'] ?? 'N/A' }}</td>
                        <td>{{ $totals['seven_shots'] ?? 'N/A' }}</td>
                        <td>{{ $totals['fourteen_shots'] ?? 'N/A' }}</td>
                        <td>{{ $totals['mp5'] ?? 'N/A' }}</td>
                        <td>{{ $totals['kalakov'] ?? 'N/A' }}</td>
                        <td>{{ $totals['bore30_total_bullets'] ?? 'N/A' }}</td>
                        <td>{{ $totals['bore30_total'] ?? 'N/A' }}</td>
                        <td>{{ $totals['mp_5'] ?? 'N/A' }}</td>
                        <td>{{ $totals['zagana'] ?? 'N/A' }}</td>
                        <td>{{ $totals['breta'] ?? 'N/A' }}</td>
                        <td>{{ $totals['glock'] ?? 'N/A' }}</td>
                        <td>{{ $totals['mm9_total_bullets'] ?? 'N/A' }}</td>
                        <td>{{ $totals['mm9_total'] ?? 'N/A' }}</td>
                        <td>{{ $totals['mm7_standard'] ?? 'N/A' }}</td>
                        <td>{{ $totals['mm7_total_bullets'] ?? 'N/A' }}</td>
                        <td>{{ $totals['rifle_222'] ?? 'N/A' }}</td>
                        <td>{{ $totals['rifle_222_bullets'] ?? 'N/A' }}</td>
                        <td>{{ $totals['rifle_44'] ?? 'N/A' }}</td>
                        <td>{{ $totals['rifle_44_bullets'] ?? 'N/A' }}</td>
                        <td>{{ $totals['rifle_223'] ?? 'N/A' }}</td>
                        <td>{{ $totals['rifle_223_bullets'] ?? 'N/A' }}</td>
                        <td>{{ $totals['rifle_223_m4'] ?? 'N/A' }}</td>
                        <td>{{ $totals['rifle_223_m4_bullets'] ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        @if (auth()->check() && auth()->user()->role !== 'client')
            <div class="float-end mb-3">
                <a class="btn btn-primary btn-sm" href="{{ route('post.weakly.recordes') }}">
                    + New Record
                </a>
            </div>
        @endif
        <div class="row align-items-center">
            <div class="col-lg-2">
                <img src="https://piffersoftware.com/images/piffer-logo1.png" alt="Piffer Logo" style="max-height: 80px;">
            </div>
            <div class="col-lg-8 text-center">
                <h1 class="mb-0" style="font-family: 'Stencil', sans-serif; font-size: 2rem;">Weekly Uniform Record Report</h1>
            </div>
            <div class="col-lg-2">
                <img src="{{ asset('https://piffersoftware.com/images/piffer-logo1.png') }}" alt="Secondary Logo" style="max-height: 80px;">
            </div>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover" id="clientReportTabless" >
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Branch</th>
                        <th>Standard Uniform</th>
                        <th>White Sleeves</th>
                        <th>Ssg Uniform</th>
                        <th>T Shirt</th>
                        <th>Lady Gown</th>
                        <th>Suit</th>
                        <th>Dms</th>
                        <th>Standard Shows</th>
                        <th>Beige Color Shoes</th>
                        <th>Whistile N Dory</th>
                        <th>Employee Card</th>
                        <th>P Gap</th>
                        <th>Barret Cap</th>
                        <th>White Belt</th>
                        <th>Black Belt</th>
                        <th>Sash</th>
                        <th>Qamar Barand</th>
                        <th>White Gloves</th>
                        <th>White Arm Sleves</th>
                        <th>Arm Band</th>
                        <th>Scarf</th>
                        <th>Winter Jacket</th>
                        <th>High Visibility Jacket</th>
                        <th>Jarsee</th>
                        <th>Rain Coat</th>
                        <th>Umbrella</th>
                        <th>Torch</th>
                        <th>Others</th>
                        <th>Supervisor Signature</th>
                        <th>Manager Operation Signature</th>
                        <th>Gm Signature</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($uniformbranches as $index=>$record)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $record->uni_date ?? 'N/A' }}</td>
                            <td>{{ $record->Ubranch->branch_office_name ?? 'N/A' }}</td>

                            <td>{{ $record->stand_uniform ?? 'N/A' }}</td>
                            <td>{{ $record->white_sleeves ?? 'N/A' }}</td>
                            <td>{{ $record->ssg_uniform ?? 'N/A' }}</td>
                            <td>{{ $record->t_shirt ?? 'N/A' }}</td>
                            <td>{{ $record->lady_gown ?? 'N/A' }}</td>
                            <td>{{ $record->suit ?? 'N/A' }}</td>
                            <td>{{ $record->dms ?? 'N/A' }}</td>
                            <td>{{ $record->standard_shows ?? 'N/A' }}</td>
                            <td>{{ $record->beige_color_shoes ?? 'N/A' }}</td>
                            <td>{{ $record->whistile_n_dory ?? 'N/A' }}</td>
                            <td>{{ $record->employee_card ?? 'N/A' }}</td>
                            <td>{{ $record->p_gap ?? 'N/A' }}</td>
                            <td>{{ $record->barret_cap ?? 'N/A' }}</td>
                            <td>{{ $record->white_belt ?? 'N/A' }}</td>
                            <td>{{ $record->black_belt ?? 'N/A' }}</td>
                            <td>{{ $record->sash ?? 'N/A' }}</td>
                            <td>{{ $record->qamar_barand ?? 'N/A' }}</td>
                            <td>{{ $record->white_gloves ?? 'N/A' }}</td>
                            <td>{{ $record->white_arm_sleves ?? 'N/A' }}</td>
                            <td>{{ $record->arm_band ?? 'N/A' }}</td>
                            <td>{{ $record->scarf ?? 'N/A' }}</td>
                            <td>{{ $record->winter_jacket ?? 'N/A' }}</td>
                            <td>{{ $record->high_visibility_jacket ?? 'N/A' }}</td>
                            <td>{{ $record->jarsee ?? 'N/A' }}</td>
                            <td>{{ $record->rain_coat ?? 'N/A' }}</td>
                            <td>{{ $record->umbrella ?? 'N/A' }}</td>
                            <td>{{ $record->torch ?? 'N/A' }}</td>
                            <td>{{ $record->others ?? 'N/A' }}</td>
                            <td>{{ $record->supervisor_signature ?? 'N/A' }}</td>
                            <td>{{ $record->manager_operation_signature ?? 'N/A' }}</td>
                            <td>{{ $record->gm_signature ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
  </div>
</div>
</div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            // Check if DataTable is initialized
            try {
                $('#clientReportTable').DataTable({
                    dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>rtip',
                    buttons: [
                        {
                            extend: 'copy',
                            className: 'btn btn-primary btn-sm',
                            text: 'Copy',
                            exportOptions: { columns: ':visible' }
                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-primary btn-sm',
                            text: 'CSV',
                            exportOptions: { columns: ':visible' }
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-primary btn-sm',
                            text: 'Excel',
                            exportOptions: { columns: ':visible' }
                        },
                        {
                            extend: 'pdf',
                            className: 'btn btn-primary btn-sm',
                            text: 'PDF',
                            orientation: 'landscape',
                            pageSize: 'A4',
                            exportOptions: { columns: ':visible' },
                            customize: function(doc) {
                                doc.defaultStyle.fontSize = 8;
                                doc.styles.tableHeader.fontSize = 8;
                                doc.pageMargins = [10, 10, 10, 10];
                            }
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-primary btn-sm',
                            text: 'Print',
                            title: '',
                            messageTop: '<h2 class="text-center">Weekly Weapon Record Report</h2>',
                            exportOptions: { columns: ':visible' },
                            customize: function(win) {
                                $(win.document.body).css({
                                    'font-size': '10pt',
                                    'margin': '20px'
                                });
                                $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                            }
                        }
                    ],
                    paging: false,
                    info: false,
                    order: [],
                    scrollX: true,
                    language: {
                        search: "Filter records:"
                    }
                });
            } catch (e) {
                console.error('DataTable initialization error:', e);
            }
        });
    </script>

        <script>
        $(document).ready(function() {
            // Check if DataTable is initialized
            try {
                $('#clientReportTabless').DataTable({
                    dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>rtip',
                    buttons: [
                        {
                            extend: 'copy',
                            className: 'btn btn-primary btn-sm',
                            text: 'Copy',
                            exportOptions: { columns: ':visible' }
                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-primary btn-sm',
                            text: 'CSV',
                            exportOptions: { columns: ':visible' }
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-primary btn-sm',
                            text: 'Excel',
                            exportOptions: { columns: ':visible' }
                        },
                        {
                            extend: 'pdf',
                            className: 'btn btn-primary btn-sm',
                            text: 'PDF',
                            orientation: 'landscape',
                            pageSize: 'A4',
                            exportOptions: { columns: ':visible' },
                            customize: function(doc) {
                                doc.defaultStyle.fontSize = 8;
                                doc.styles.tableHeader.fontSize = 8;
                                doc.pageMargins = [10, 10, 10, 10];
                            }
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-primary btn-sm',
                            text: 'Print',
                            title: '',
                            messageTop: '<h2 class="text-center">Weekly Weapon Record Report</h2>',
                            exportOptions: { columns: ':visible' },
                            customize: function(win) {
                                $(win.document.body).css({
                                    'font-size': '10pt',
                                    'margin': '20px'
                                });
                                $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                            }
                        }
                    ],
                    paging: false,
                    info: false,
                    order: [],
                    scrollX: true,
                    language: {
                        search: "Filter records:"
                    }
                });
            } catch (e) {
                console.error('DataTable initialization error:', e);
            }
        });
    </script>
</body>
</html>
