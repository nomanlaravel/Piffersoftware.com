<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Region Wise Sales Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .report-header {
            background-color: #4472c4;
            color: white;
            padding: 10px;
            text-align: center;
            border: 1px solid #2f5597;
        }

        .report-subtext {
            font-size: 0.85rem;
            margin-top: 5px;
            color: #080808;
        }

        .report-body {
            background-color: #a1b6da;
            color: white;
            padding: 10px;
            text-align: center;
            border: 1px solid #2f5597;
        }

        .report-subtext1 {
            font-size: 0.85rem;
            margin-top: 5px;
            color: #080808;
        }

        .report-body1 {
            background-color: #d2e0f8;
            color: white;
            padding: 10px;
            text-align: center;
            border: 1px solid #2f5597;
        }

        .report-subtext2 {
            font-size: 0.85rem;
            margin-top: 5px;
            color: #080808;
        }

        /* Summary Bars Style */
        .status-bar {
            display: flex;
            text-align: center;
            font-weight: bold;
            color: white;
            margin-bottom: 0;
        }

        .status-green {
            background-color: #70ad47;
            flex: 1;
            padding: 5px;
        }

        .status-yellow {
            background-color: #ffc000;
            flex: 1;
            padding: 5px;
        }

        .status-red {
            background-color: #c00000;
            flex: 1;
            padding: 5px;
        }

        /*  */
        .report-body2 {
            background-color: #f1d0a3;
            color: #080808;
            padding: 10px;
            text-align: center;
            border: 1px solid;
        }

        .report-subtext3 {
            font-size: 0.85rem;
            margin-top: 5px;
            color: #080808;
        }

        .report-body3 {
            background-color: #e73131;
            color: #080808;
            padding: 10px;
            text-align: center;
            border: 1px solid;
        }

        .report-subtext4 {
            font-size: 0.85rem;
            margin-top: 5px;
            color: #080808;
        }


        /* Table Customization */
        .table thead th {
            background-color: #4472c4;
            color: white;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #fff;
            font-size: 0.9rem;
        }

        .region-header {
            background-color: #d9e1f2;
            font-weight: bold;
            text-align: center;
            color: #2f5597;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #ffffff;
        }

        .table-striped tbody tr:nth-of-type(even) {
            background-color: #f2f2f2;
        }

        td {
            text-align: center;
            font-size: 0.85rem;
            border: 1px solid #dee2e6 !important;
        }

        @media print {
            .status-bar div {
                -webkit-print-color-adjust: exact;
            }

            .report-header {
                -webkit-print-color-adjust: exact;
                background-color: #4472c4 !important;
            }
        }
        .action-buttons {
    margin-bottom: 20px;
    text-align: right;
}

.action-buttons form {
    display: inline;
}

.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    color: white;
    font-size: 14px;
    margin-left: 5px;
    transition: all 0.2s ease-in-out;
}

/* PDF - Elegant Red */
.btn-pdf {
    background-color: #dc3545;
}

.btn-pdf:hover {
    background-color: #c82333;
}

/* Excel - Clean Green */
.btn-excel {
    background-color: #28a745;
}

.btn-excel:hover {
    background-color: #218838;
}

/* Print - Neutral Blue */
.btn-print {
    background-color: #007bff;
}

.btn-print:hover {
    background-color: #0056b3;
}
    </style>
</head>

<body>

    <div class="container-fluid mt-3">
        <!-- Main Header -->
         <div class="action-buttons">
    <form method="POST" action="{{ route('visitsales.pdf') }}">
        @csrf
        <input type="hidden" name="date_range" value="{{ $date_range ?? '' }}">
        <button type="submit" class="btn btn-pdf">📄 Download PDF</button>
    </form>

    <form method="POST" action="{{ route('visitsales.excel') }}">
        @csrf
        <input type="hidden" name="date_range" value="{{ $date_range ?? '' }}">
        <button type="submit" class="btn btn-excel">📊 Download Excel</button>
    </form>

    <button onclick="window.print()" class="btn btn-print">🖨️ Print</button>
</div>
        <div class="report-header">
            <h4 class="mb-0"><b>PIFFERS Security Services (Pvt) Ltd</b></h4>
        </div>
        <div class="report-body">
            <p class="report-subtext1 mb-0">if You've Missed your Last 2 Months Sales Targets You're Unlikely to hit the Next One, Unless You Change Something Choose Change.</p>
        </div>
        <div class="report-body1">
            <p class="report-subtext2 mb-0"><b>WEEKLY SALES VISIT PLAN</b></p>
        </div>

        <!-- Color Coded Legend/Status Bar -->
        <div class="report-body2">
            <p class="report-subtext3 mb-0">The weekly deadline for submission of this report is Friday at 5:00 PM</p>
        </div>

<div class="table-responsive">
           
            <table class="table table-bordered table-striped mt-0">
                <thead>
                    <tr>
                        <th>Sr No</th>
                        <th>Branch Name</th>
                        <th>Branch Id</th>
                        <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($date_range))
                        <div class="report-body2">
                            <p class="report-subtext3 mb-0">
                                <b>Date Range: {{ $date_range }}</b>
                            </p>
                        </div>
                    @endif
                    @php $currentRegion = null; @endphp
                    @foreach($sales as $index => $sale)
                        {{-- Adds a divider row if the region changes --}}
                        @if($currentRegion !== $sale->region->region_name)
                            <tr class="region-header">
                                <td colspan="10" class="text-uppercase">{{ $sale->region->region_name }}</td>
                            </tr>
                            @php $currentRegion = $sale->region->region_name; @endphp
                        @endif
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sale->branch_office_name }}</td>
                            <td>{{ $sale->branch_id }}</td>
                            <td>{{ $sale->employee_name }}</td>
                            <td>{{ $sale->designation }}</td>
                            <td>{{ $sale->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

</body>

</html>