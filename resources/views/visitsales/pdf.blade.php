<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 11px; }
        .report-header {
            background-color: #4472c4 !important;
            color: white;
            padding: 15px;
            text-align: center;
            border: 1px solid #2f5597;
            font-size: 16px;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 20px;
            font-weight: bold;
        }
        .report-body {
            background-color: #a1b6da !important;
            color: white;
            padding: 10px;
            text-align: center;
            border: 1px solid #2f5597;
            margin-left: 20px;
            margin-right: 20px;
            font-size: 12px;
        }
        .report-body1 {
            background-color: #d2e0f8 !important;
            color: black;
            padding: 10px;
            text-align: center;
            border: 1px solid #2f5597;
            font-weight: bold;
            margin-left: 20px;
            margin-right: 20px;
            font-size: 14px;
        }
        .report-body2 {
            background-color: #f1d0a3 !important;
            color: black;
            padding: 10px;
            text-align: center;
            border: 1px solid;
            margin-left: 20px;
            margin-right: 20px;
            font-size: 11px;
        }
        .table {
            width: 96.5%;
            border-collapse: collapse;
            margin-left: 20px;
            margin-right: 20px;
            font-size: 10px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 3px 5px;
            text-align: center;
            margin-left: 20px;
            margin-right: 20px;
        }
        .table thead th {
            background-color: #4472c4 !important;
            color: white !important;
            font-weight: bold;
            font-size: 11px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .region-header {
            background-color: #d9e1f2 !important;
            font-weight: bold;
            text-align: center;
            color: #2f5597;
            font-size: 12px;
            margin-left: 20px;
            margin-right: 20px;
        }
        @page { margin: 0.25in; size: A4 landscape; }
    </style>
    <title>Weekly Sales Visit Plan Report</title>
</head>
<body>
    <div style="width: 100%;">
        <!-- Main Header -->
        <div class="report-header">
            PIFFERS Security Services (Pvt) Ltd
        </div>
        
        <div class="report-body">
            <div style="font-size: 11px;">
                if You've Missed your Last 2 Months Sales Targets You're Unlikely to hit the Next One, Unless You Change Something Choose Change.
            </div>
        </div>
        
        <div class="report-body1">
            WEEKLY SALES VISIT PLAN
        </div>
        
        <div class="report-body2">
            The weekly deadline for submission of this report is Friday at 5:00 PM
        </div>

        @if(!empty($date_range))
            <div style="text-align: center; margin: 10px 0; font-weight: bold; font-size: 12px;">
                Date Range: {{ $date_range }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Branch Name</th>
                    <th>Branch Id</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                </tr>
            </thead>
            <tbody>
                @php $currentRegion = null; @endphp
                @foreach($sales as $index => $sale)
                    @if($currentRegion !== $sale->region->region_name)
                        <tr class="region-header">
                            <td colspan="10">{{ strtoupper($sale->region->region_name ?? 'N/A') }}</td>
                        </tr>
                        @php $currentRegion = $sale->region->region_name; @endphp
                    @endif
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $sale->branch_office_name ?? 'N/A' }}</td>
                        <td>{{ $sale->branch_id ?? '' }}</td>
                        <td>{{ $sale->employee_name ?? '' }}</td>
                        <td>{{ $sale->designation ?? '' }}</td>
                        <td>{{ $sale->monday ?? '' }}</td>
                        <td>{{ $sale->tuesday ?? '' }}</td>
                        <td>{{ $sale->wednesday ?? '' }}</td>
                        <td>{{ $sale->thursday ?? '' }}</td>
                        <td>{{ $sale->friday ?? '' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
