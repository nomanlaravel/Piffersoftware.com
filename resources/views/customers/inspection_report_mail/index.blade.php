<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $companyName }} - Inspection Report</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f6f7f9;
            font-family: DejaVu Sans, Arial, sans-serif;
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

        /* PDF-specific: prevent rows from breaking across pages */
        .qa-table tr {
            page-break-inside: avoid;
        }
        .qa-table {
            page-break-before: auto;
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

                    @if(isset($inspectionForm) && $inspectionForm && $inspectionForm->answers->count() > 0)
                    <tr>
                        <td style="padding: 0 24px 24px 24px;">

                            <h3 style="margin-top:24px;color:#0b2a4a;border-bottom:2px solid #0b2a4a;padding-bottom:8px;">
                                Questions &amp; Answers
                            </h3>

                            <table class="qa-table" style="width:100%;border:1px solid #e5e7eb;margin-top:12px;border-collapse:collapse;font-family:DejaVu Sans, Arial, sans-serif;">
                                <thead>
                                    <tr style="background:#0b2a4a;color:#ffffff;">
                                        <th style="padding:10px;font-weight:bold;width:30px;border:1px solid #e5e7eb;text-align:left;">#</th>
                                        <th style="padding:10px;font-weight:bold;border:1px solid #e5e7eb;text-align:right;direction:rtl;" dir="rtl">Question</th>
                                        <th style="padding:10px;font-weight:bold;width:140px;border:1px solid #e5e7eb;text-align:left;">Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($inspectionForm->answers as $index => $answer)
                                    <tr style="background:{{ $index % 2 == 0 ? '#f9fafb' : '#ffffff' }};page-break-inside:avoid;">
                                        <td style="padding:10px;border:1px solid #e5e7eb;text-align:left;vertical-align:top;">{{ $index + 1 }}</td>
                                        <td style="padding:10px;border:1px solid #e5e7eb;text-align:right;direction:rtl;vertical-align:top;" dir="rtl">
                                            {{ $answer->question->question ?? 'N/A' }}
                                        </td>
                                        <td style="padding:10px;border:1px solid #e5e7eb;text-align:left;vertical-align:top;">
                                            @if($answer->option)
                                                {{ $answer->option->option_text }}
                                            @endif
                                            @if($answer->custom_answer)
                                                @if($answer->option)
                                                    <br><em style="color:#6b7280;">Additional: </em>
                                                @endif
                                                {{ $answer->custom_answer }}
                                            @endif
                                            @if(!$answer->option && !$answer->custom_answer)
                                                <em style="color:#9ca3af;">No answer provided</em>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </td>
                    </tr>
                    @endif

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