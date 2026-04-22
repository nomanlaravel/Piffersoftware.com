<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        
        .table-container { width: 100%; border-collapse: collapse; border: 2px solid #000; }

        /* Header Sections */
        .main-title { background-color: #a7c1e1; font-size: 28px; font-weight: bold; text-align: center; padding: 10px; border-bottom: 2px solid #000; }
        .region-title { background-color: #d9e1f2; font-size: 24px; font-weight: bold; text-align: center; padding: 8px; border-bottom: 2px solid #000; }
        .instruction-title { background-color: #ffcc66; font-size: 22px; font-weight: bold; text-align: center; padding: 15px; border-bottom: 2px solid #000; }
        .region-header { background-color: #d9e1f2; font-size: 24px; font-weight: bold; text-align: center; padding: 8px; border-bottom: 2px solid #000; }
        /* Table Structure */
        table { width: 100%; border-collapse: collapse; }
        th { background-color: #f8cbad; border: 1px solid #000; padding: 12px; font-size: 16px; }
        td { border: 1px solid #000; padding: 8px; text-align: center; font-size: 14px; height: 25px; }

        /* Column Specifics */
        .col-sr { width: 5%; }
        .col-prospect { width: 25%; text-align: center; padding-left: 15px; }
        .col-services { width: 40%; }
        .col-remarks { width: 30%; }

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
    <title>Region Wise Daily Sales Pipeline</title>
</head>
<body>
    <!-- Server-side Export Buttons -->
    <div class="action-buttons">
    <form method="POST" action="{{ route('pipelinesales.pdf') }}">
        @csrf
        <input type="hidden" name="date_range" value="{{ $date_range ?? '' }}">
        <button type="submit" class="btn btn-pdf">📄 Download PDF</button>
    </form>

    <form method="POST" action="{{ route('pipelinesales.excel') }}">
        @csrf
        <input type="hidden" name="date_range" value="{{ $date_range ?? '' }}">
        <button type="submit" class="btn btn-excel">📊 Download Excel</button>
    </form>

    <button onclick="window.print()" class="btn btn-print">🖨️ Print</button>
</div>
    <div class="table-container">
     
        <div class="main-title">Region Wise Daily Sales Pipeline.</div>
        <div class="instruction-title">Enter data from the Quotation Log Register and Sales Visit Report.</div>

        <table>
            <thead class="text-center">
                <tr>
                    <th class="col-sr">Sr#</th>
                    <th class="col-prospect">Branch Name</th>
                    <th class="col-prospect">Prospect name</th>
                    <th class="col-prospect">Sales Perform by</th>
                    <th class="col-prospect">Number of Technical Proposal Sent</th>
                    <th class="col-prospect">Number of Quotation Shared</th>
                    <th class="col-services">Required Services</th>
                    <th class="col-remarks">Remarks</th>
                </tr>
            </thead>
             <tbody>
                     @if(!empty($date_range))
            <tr>
                <td colspan="8" style="text-align:center; font-weight:bold; background:#eee;">
                    Date Range: {{ $date_range }}
                </td>
            </tr>
        @endif
                    @php $currentRegion = null; @endphp
                    @foreach($salesreports as $index => $salesreport)
                        {{-- Adds a divider row if the region changes --}}
                        @if($currentRegion !== $salesreport->region->region_name)
                            <tr class="region-header">
                                <td colspan="10" class="text-uppercase"><b>{{ $salesreport->region->region_name }}</b></td>
                            </tr>
                            @php $currentRegion = $salesreport->region->region_name; @endphp
                        @endif
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $salesreport->admin->branch_office_name }}</td>
                            <td>{{ $salesreport->prospect_name }}</td>
                            <td>{{ $salesreport->sales_visit }}</td>
                            <td>{{ $salesreport->proposal_sent }}</td>
                            <td>{{ $salesreport->quotation_sent }}</td>
                            <td>{{ $salesreport->required_services }}</td>
                            <td>{{ $salesreport->remarks }}</td>
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
