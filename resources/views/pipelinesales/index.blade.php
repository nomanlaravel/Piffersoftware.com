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
        .col-prospect { width: 25%; text-align: left; padding-left: 15px; }
        .col-services { width: 40%; }
        .col-remarks { width: 30%; }
    </style>
    <title>Region Wise Daily Sales Pipeline</title>
</head>
<body>

    <div class="table-container">
        <div class="main-title">Region Wise Daily Sales Pipeline.</div>
        <div class="instruction-title">Enter data from the Quotation Log Register and Sales Visit Report.</div>

        <table>
            <thead>
                <tr>
                    <th class="col-sr">Sr#</th>
                    <th class="col-prospect">Prospect name</th>
                    <th class="col-services">Required Services</th>
                    <th class="col-remarks">Remarks</th>
                </tr>
            </thead>
             <tbody>
                    @if(!empty($date_range))
                        <tr>
                            <td colspan="4" style="text-align: center; background-color: #f0f0f0; font-weight: bold;">
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
                            <td>{{ $salesreport->prospect_name }}</td>
                            <td>{{ $salesreport->required_services }}</td>
                            <td>{{ $salesreport->remarks }}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>

</body>
</html>
