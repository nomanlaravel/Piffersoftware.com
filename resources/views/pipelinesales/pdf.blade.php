<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <style>
        @page {
            size: A4 landscape;
            margin: 10px;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }

        .table-container {
            width: 100%;
        }

        .main-title {
            background-color: #a7c1e1;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            padding: 6px;
            border: 1px solid #000;
        }

        .instruction-title {
            background-color: #ffcc66;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            padding: 6px;
            border: 1px solid #000;
        }

        .region-header {
            background-color: #d9e1f2;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* IMPORTANT */
        }

        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
            word-wrap: break-word;
        }

        th {
            background-color: #f8cbad;
            font-size: 11px;
        }

        td {
            font-size: 10px;
        }

        /* Adjust column widths */
        .col-sr { width: 3%; }
        .col-branch { width: 12%; }
        .col-prospect { width: 12%; }
        .col-sales { width: 10%; }
        .col-proposal { width: 10%; }
        .col-quotation { width: 10%; }
        .col-services { width: 18%; }
        .col-remarks { width: 15%; }

    </style>

    <title>Region Wise Daily Sales Pipeline</title>
</head>

<body>

<div class="table-container">

    <div class="main-title">Region Wise Daily Sales Pipeline</div>
    <div class="instruction-title">
        Enter data from the Quotation Log Register and Sales Visit Report
    </div>

    <table>
        <thead>
        <tr>
            <th class="col-sr">Sr#</th>
            <th class="col-branch">Branch Name</th>
            <th class="col-prospect">Prospect Name</th>
            <th class="col-sales">Sales By</th>
            <th class="col-proposal">Proposal Sent</th>
            <th class="col-quotation">Quotation Shared</th>
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

        @foreach($pipelineSales as $index => $pipelineSale)

            @if($currentRegion !== $pipelineSale->region->region_name)
                <tr class="region-header">
                    <td colspan="8">
                        {{ $pipelineSale->region->region_name }}
                    </td>
                </tr>
                @php $currentRegion = $pipelineSale->region->region_name; @endphp
            @endif

            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pipelineSale->admin->branch_office_name }}</td>
                <td>{{ $pipelineSale->prospect_name }}</td>
                <td>{{ $pipelineSale->sales_visit }}</td>
                <td>{{ $pipelineSale->proposal_sent }}</td>
                <td>{{ $pipelineSale->quotation_sent }}</td>
                <td>{{ $pipelineSale->required_services }}</td>
                <td>{{ $pipelineSale->remarks }}</td>
            </tr>

        @endforeach

        </tbody>
    </table>

</div>

</body>
</html>