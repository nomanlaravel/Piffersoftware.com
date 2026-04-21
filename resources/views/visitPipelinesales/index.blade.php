<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .report-table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .report-table th, .report-table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
        }
        /* Header Colors matching the image */
        .title-header { background-color: #92D050; font-weight: bold; } /* Green */
        .date-header { background-color: #B4C6E7; font-weight: bold; }  /* Light Blue */
        .column-header { background-color: #00B0F0; color: white; }    /* Bright Blue */
        
        /* Region divider */
        .region-header {
            background-color: #eee88f; /* Yellow */
            font-weight: bold;
            text-align: left !important;
        }
        .ranges {
            background-color: #c0e4f5; /* Yellow */
            font-weight: bold;
            text-align: left !important;
        }
        .table-responsive { overflow-x: auto; }
    </style>
    <title>Region wise Daily Finalize Sales report</title>
</head>
<body>

<div class="table-responsive">
    <table class="report-table">
        <thead>
            <!-- Main Title Row -->
            <tr class="title-header">
                <th colspan="11">REGION WISE DAILY FINALIZE SALES REPORT</th>
            </tr>
            <!-- Date/Sub-Title Row -->
            <tr class="date-header ranges">
                <th colspan="11"> 
                    @if(!empty($date_range)) 
                 Date Ranges: {{ $date_range }} @endif
                </th>
            </tr>
             
            <!-- Column Group Headers -->
            <tr class="column-header">
                <th>Sr #</th>
                <th>Customer Name</th>
                <th>Branch Name</th>
                <th>Sales Perform by</th>
                <th>Number of Technical Proposal Sent</th>
                <th>Number of Quotation Shared</th>
                <th>Number Of Guard Deployed</th>
                <th>Contractual Value</th>
                <th>Total Margin</th>
            </tr>
        </thead>
        <tbody>
            @php $currentRegion = null; @endphp
            @foreach($sales as $index => $sale)
                
                @if($currentRegion !== $sale->region->region_name)
                    <tr class="region-header">
                        <td colspan="11" class="text-uppercase">{{ $sale->region->region_name }}</td>
                    </tr>
                    @php $currentRegion = $sale->region->region_name; @endphp
                @endif

                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $sale->customer_name ?? 'N/A' }}</td>
                    <td>{{ $sale->admin->branch_office_name }}</td>
                    <td>{{ $sale->sales_visit }}</td>
                    <td>{{ $sale->proposal_sent }}</td>
                    <td>{{ $sale->quotation_sent }}</td>
                    <td>{{ $sale->guard_deployed_by_ho }}</td>
                    <td>{{ $sale->contractual_value }}</td>
                    <td>{{ $sale->total_margin }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<style> 

    th { 

        border: 1px solid black; 

        padding: 5px; 

        /* THIS IS THE KEY PROPERTY */ 

        white-space: nowrap;  

    } 

    </style> 
</body>
</html>
