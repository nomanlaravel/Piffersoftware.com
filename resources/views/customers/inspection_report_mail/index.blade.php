<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $companyName }} - Inspection Report</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f6f7f9;
            font-family: Arial
        }

        table {
            border-collapse: collapse
        }

        .container {
            width: 100%;
            background: #f6f7f9;
            padding: 24px 0
        }

        .card {
            width: 600px;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden
        }

        .header {
            padding: 20px;
            background: #0b2a4a;
            color: white
        }

        .content {
            padding: 24px;
        }

        .summary {
            width: 100%;
            border: 1px solid #e5e7eb
        }

        .summary td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb
        }

        .summary td:first-child {
            background: #f9fafb;
            font-weight: bold;
            width: 180px
        }

        .footer {
            padding: 16px;
            background: #f9fafb;
            font-size: 12px;
            color: #6b7280
        }
    </style>
</head>

<body>

    <table class="container">
        <tr>
            <td align="center">

                <table class="card">

                    <tr>
                        <td class="header">

                            <img src="https://piffersoftware.com/logo.png" style="max-width:160px">

                            <h2>Customer Inspection Report</h2>

                            <p>Full PDF report attached.</p>

                        </td>
                    </tr>

                    <tr>
                        <td class="content">

                            <p>Hello,</p>

                            <p>Your inspection has been recorded successfully.</p>

                            <table class="summary">

                                <tr>
                                    <td>Inspection No</td>
                                    <td>{{ $inspection->inspection_no }}</td>
                                </tr>

                                <tr>
                                    <td>Inspector</td>
                                    <td>{{ $inspection->inspection_emp_name }}</td>
                                </tr>

                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $inspection->inspection_emp_cell }}</td>
                                </tr>

                                <tr>
                                    <td>Department</td>
                                    <td>{{ $inspection->inspection_emp_dept }}</td>
                                </tr>

                                <tr>
                                    <td>Date</td>
                                    <td>{{ $inspection->inspection_date }}</td>
                                </tr>

                                <tr>
                                    <td>Remarks</td>
                                    <td>{{ $inspection->inspection_rem_petr }}</td>
                                </tr>

                                <tr>
                                    <td>Note</td>
                                    <td>{{ $inspection->inspection_note }}</td>
                                </tr>

                            </table>

                            @if($inspection->inspection_pic)

                            <h4>Inspection Photo</h4>

                                <img src="{{ asset('storage/'.$inspection->inspection_pic) }}"
                                style="max-width:100%;border-radius:6px">

                            @endif

                        </td>
                    </tr>

                    <tr>
                        <td class="footer">

                            {{ $companyName }}<br>
                            Automated inspection report

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>