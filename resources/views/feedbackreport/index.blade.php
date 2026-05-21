<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Register Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <style>
        body { background-color: #f4f6f9; font-family: 'Segoe UI', sans-serif; }

        .page-header {
            background: linear-gradient(135deg, #34005A, #6a0dad);
            color: white; padding: 25px 30px;
            border-radius: 12px; margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(52,0,90,0.3);
        }
        .page-header h3 { margin: 0; font-size: 22px; font-weight: 700; }
        .page-header p  { margin: 5px 0 0; font-size: 13px; opacity: 0.85; }

        .table-card {
            background: white; border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        .table-card-body { padding: 20px; }

        /* ✅ KEY FIX: scrollX DataTables ki jagah CSS overflow use karo */
        .table-responsive-wrapper {
            overflow-x: auto;
            width: 100%;
        }

        table#feedbackTable {
            width: 100% !important;
            min-width: 1400px; /* table ko horizontal scroll deta hai */
            border-collapse: collapse;
        }

        table#feedbackTable thead th {
            background-color: #34005A !important;
            color: white !important;
            font-weight: 600;
            font-size: 11px;
            white-space: nowrap;
            border: 1px solid #4a0080 !important;
            padding: 8px 10px !important;
            text-align: center;
        }

        table#feedbackTable tbody tr:hover { background-color: #f3eaff; }

        table#feedbackTable tbody td {
            font-size: 11px;
            vertical-align: middle;
            border-color: #f0f0f0 !important;
            white-space: nowrap;
            padding: 7px 10px !important;
            text-align: center;
        }

        table#feedbackTable tbody td:nth-child(2),
        table#feedbackTable tbody td:nth-child(4) {
            text-align: left;
        }

        .score-badge {
            display: inline-block; padding: 3px 8px;
            border-radius: 20px; font-weight: 700; font-size: 11px;
        }
        .score-high   { background: #d4edda; color: #155724; }
        .score-medium { background: #fff3cd; color: #856404; }
        .score-low    { background: #f8d7da; color: #721c24; }

        .btn-view {
            background: #34005A; color: white; border: none;
            padding: 3px 10px; border-radius: 6px; font-size: 11px;
            text-decoration: none; display: inline-block;
        }
        .btn-view:hover { background: #6a0dad; color: white; }
        .btn-no-attach {
            background: #e9ecef; color: #6c757d; border: none;
            padding: 3px 10px; border-radius: 6px; font-size: 11px;
            display: inline-block;
        }

        .customer-name { font-weight: 600; color: #34005A; }

        .dt-buttons .dt-button {
            background: #34005A !important; color: white !important;
            border: none !important; border-radius: 6px !important;
            padding: 6px 14px !important; font-size: 12px !important;
            margin-right: 5px !important;
        }
        .dt-buttons .dt-button:hover { background: #6a0dad !important; }

        .dataTables_filter { display: none !important; }

        /* DataTables wrapper ko overflow allow karo */
        .dataTables_wrapper {
            overflow-x: auto;
        }

        .no-data { text-align: center; padding: 60px 20px; color: #999; }
    </style>
</head>
<body>

<div class="container-fluid mt-4 mb-5">

    {{-- Page Header --}}
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3>📋 Feedback Register Report</h3>
                <p>PIFFERS Security Services — Customer Feedback Records</p>
            </div>
            <div style="font-size:13px; opacity:0.8;">
                Generated: {{ \Carbon\Carbon::now()->format('d M Y, h:i A') }}
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="table-card">
        <div class="table-card-body">

            @if($feedbacks->isEmpty())
                <div class="no-data">
                    <p style="font-size:48px;">📭</p>
                    <p>Koi feedback record nahi mila.</p>
                </div>
            @else
                {{-- ✅ CSS wrapper scroll — DataTables scrollX nahi --}}
                <div class="table-responsive-wrapper">
                    <table id="feedbackTable" class="table table-bordered display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Customer Name</th>
                                <th>Customer ID</th>
                                <th>Client Name</th>
                                <th>Client ID</th>
                                <th>Feed Date</th>
                                <th>Feed Month</th>
                                <th>Q1</th>
                                <th>Q2</th>
                                <th>Q3</th>
                                <th>Q4</th>
                                <th>Q5</th>
                                <th>Q6</th>
                                <th>Q7</th>
                                <th>Q8</th>
                                <th>Q9</th>
                                <th>Q10</th>
                                <th>Total Score</th>
                                <!-- <th>Attachment</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedbacks as $i => $feedback)
                                @php
                                    $score      = is_numeric($feedback->total_score) ? (float) $feedback->total_score : 0;
                                    $scoreClass = $score >= 80 ? 'score-high' : ($score >= 50 ? 'score-medium' : 'score-low');
                                @endphp
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        <div class="customer-name">
                                            {{ $feedback->customer->customers_name ?? '—' }}
                                        </div>
                                    </td>
                                    <td>{{ $feedback->customer->customers_id ?? '—' }}</td>
                                    <td>{{ $feedback->feed_client_name ?? '—' }}</td>
                                    <td>{{ $feedback->feed_client_id   ?? '—' }}</td>
                                    <td>
                                        {{ $feedback->feed_date
                                            ? \Carbon\Carbon::parse($feedback->feed_date)->format('d M Y')
                                            : '—' }}
                                    </td>
                                    <td>{{ $feedback->feed_month ?? '—' }}</td>
                                    <td>{{ $feedback->q1  ?? '—' }}</td>
                                    <td>{{ $feedback->q2  ?? '—' }}</td>
                                    <td>{{ $feedback->q3  ?? '—' }}</td>
                                    <td>{{ $feedback->q4  ?? '—' }}</td>
                                    <td>{{ $feedback->q5  ?? '—' }}</td>
                                    <td>{{ $feedback->q6  ?? '—' }}</td>
                                    <td>{{ $feedback->q7  ?? '—' }}</td>
                                    <td>{{ $feedback->q8  ?? '—' }}</td>
                                    <td>{{ $feedback->q9  ?? '—' }}</td>
                                    <td>{{ $feedback->q10 ?? '—' }}</td>
                                    <td>
                                        @if($feedback->total_score)
                                            <span class="score-badge {{ $scoreClass }}">
                                                {{ $feedback->total_score }} / 100
                                            </span>
                                        @else
                                            <span style="color:#bbb;">—</span>
                                        @endif
                                    </td>
                                    <!-- <td>
                                        @if($feedback->feed_attach)
                                            <a href="{{ asset($feedback->feed_attach) }}"
                                               target="_blank" class="btn-view">
                                                📎 View
                                            </a>
                                        @else
                                            <span class="btn-no-attach">No File</span>
                                        @endif
                                    </td> -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>

</div>

<script>
$(document).ready(function () {

    $('#feedbackTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copyHtml5',  text: '📋 Copy' },
            { extend: 'excelHtml5', text: '📊 Excel', title: 'Feedback Register Report' },
            {
                extend: 'pdfHtml5',
                text: '📄 PDF',
                title: 'Feedback Register Report',
                orientation: 'landscape',
                pageSize: 'A4'
            },
            {
                extend: 'print',
                text: '🖨️ Print',
                title: 'Feedback Register Report — PIFFERS Security Services',
                customize: function (win) {
                    $(win.document.body).css('font-size', '10pt');
                    $(win.document.body).find('table').addClass('compact').css('font-size', 'inherit');
                }
            }
        ],
        // ✅ scrollX bilkul nahi — CSS wrapper se scroll hoga
        scrollX: false,
        autoWidth: false,
        pageLength: 25,
        order: [[5, 'desc']],
        language: {
            lengthMenu: "Show _MENU_ records",
            info: "Showing _START_ to _END_ of _TOTAL_ feedbacks",
            paginate: { first: "«", last: "»", next: "›", previous: "‹" }
        }
    });

});
</script>

</body>
</html>
