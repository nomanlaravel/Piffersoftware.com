<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; font-size: 11px; }
        .report-table {
            width: 96%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .report-table th, .report-table td {
            border: 1px solid #000;
            padding: 3px 4px;
            text-align: center;
            font-size: 10px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .title-header { 
            background-color: #92D050 !important; 
            font-weight: bold; 
            font-size: 14px;
            height: 25px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .date-header { 
            background-color: #B4C6E7 !important; 
            font-weight: bold; 
            font-size: 12px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .column-header { 
            background-color: #00B0F0 !important; 
            color: white !important; 
            font-weight: bold;
            font-size: 11px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .region-header {
            background-color: #eee88f !important;
            font-weight: bold;
            text-align: left !important;
            font-size: 12px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .ranges {
            background-color: #c0e4f5 !important;
            font-weight: bold;
            text-align: left !important;
            margin-left: 20px;
            margin-right: 20px;
        }
        th { white-space: nowrap; }
        @page { margin: 0.5in; }
    </style>
    <title>Region wise Daily Finalize Sales report</title>
</head>
<body>
    <div style="width: 100%; overflow: hidden;">
        <table class="report-table">
            <thead>
                <tr class="title-header">
                    <th colspan="9">REGION WISE DAILY FINALIZE SALES REPORT</th>
                </tr>
                <tr class="date-header ranges">
                    <th colspan="9">
                        @if(!empty($date_range)) 
                            Date Ranges: {{ $date_range }}
                        @endif
                    </th>
                </tr>
                <tr class="column-header">
                    <th>Sr #</th>
                    <th>Customer Name</th>
                    <th>Branch Name</th>
                    <th>Sales Perform by</th>
                    <th>Technical Proposal Sent</th>
                    <th>Quotation Shared</th>
                    <th>Guard Deployed</th>
                    <th>Contractual Value</th>
                    <th>Total Margin</th>
                    <th>Date of Deployment</th>
                </tr>
            </thead>
            <tbody>
                @php $currentRegion = null; $sr = 1; @endphp
                @foreach($sales as $sale)
                    @if($currentRegion !== $sale->region->region_name)
                        <tr class="region-header">
                            <td colspan="9">{{ strtoupper($sale->region->region_name ?? 'N/A') }}</td>
                        </tr>
                        @php $currentRegion = $sale->region->region_name; @endphp
                    @endif
                    <tr>
                        <td>{{ $sr++ }}</td>
                        <td style="text-align: left;">{{ $sale->customer_name ?? 'N/A' }}</td>
                        <td>{{ $sale->admin->branch_office_name ?? 'N/A' }}</td>
                        <td>{{ $sale->sales_visit ?? '' }}</td>
                        <td>{{ $sale->proposal_sent ?? '' }}</td>
                        <td>{{ $sale->quotation_sent ?? '' }}</td>
                        <td>{{ $sale->guard_deployed_by_ho ?? '' }}</td>
                        <td style="text-align: right;">{{ $sale->contractual_value ?? '' }}</td>
                        <td style="text-align: right;">{{ $sale->total_margin ?? '' }}</td>
                        <td>{{ $sale->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
