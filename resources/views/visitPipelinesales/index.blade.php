<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        .btn { padding: 8px 16px; margin: 2px; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-info { background-color: #17a2b8; color: white; }
        .dt-buttons { text-align: right; margin-bottom: 20px; }
    </style>
    
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
    <title>Region wise Daily Finalize Sales report</title>
</head>
<body>

<div class="table-responsive">
    <!-- Server-side Export Buttons -->
    <div class="action-buttons">
    <form method="POST" action="{{ route('visitPipelinesales.pdf') }}">
        @csrf
        <input type="hidden" name="date_range" value="{{ $date_range ?? '' }}">
        <button type="submit" class="btn btn-pdf">📄 Download PDF</button>
    </form>

    <form method="POST" action="{{ route('visitPipelinesales.excel') }}">
        @csrf
        <input type="hidden" name="date_range" value="{{ $date_range ?? '' }}">
        <button type="submit" class="btn btn-excel">📊 Download Excel</button>
    </form>

    <button onclick="window.print()" class="btn btn-print">🖨️ Print</button>
</div>
    <table class="report-table" id="reportTable">
        <thead>
            <!-- Main Title Row -->
                <tr class="title-header">
                    <th colspan="10">REGION WISE DAILY FINALIZE SALES REPORT</th>
                </tr>
            <!-- Date/Sub-Title Row -->
                <tr class="date-header ranges">
                    <th colspan="10"> 
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
                    <th>Technical Proposal Sent</th>
                    <th>Quotation Shared</th>
                    <th>Guard Deployed</th>
                    <th>Contractual Value</th>
                    <th>Total Margin</th>
                    <th>Date of Deployment</th>
                </tr>
        </thead>
        <tbody>
            @php $currentRegion = null; @endphp
            @foreach($sales as $index => $sale)
                
                @if($currentRegion !== $sale->region->region_name)
                    <tr class="region-header">
                        <td colspan="10" class="text-uppercase">{{ $sale->region->region_name }}</td>
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
                    <td>{{ $sale->created_at }}</td>
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

</script>
</body>
</html>
