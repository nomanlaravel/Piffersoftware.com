<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Armourer Visit Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            max-width: 600px;
            margin: auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .header {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #0056b3;
        }
        .content {
            font-size: 16px;
            line-height: 1.6;
        }
        .highlight {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 6px;
            margin-top: 15px;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #6c757d;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Reminder: Armourer Visit Required
        </div>

        <div class="content">
            Dear {{ $armourer->customer->customers_name ?? 'Customer' }},<br><br>

            This is a friendly reminder that an **Armourer visit** is due, based on the authorization issued **3 months ago**.
            <div class="highlight">
                <strong>Authorization Issue Date:</strong> {{ \Carbon\Carbon::parse($armourer->arm_auth_issue)->format('d M Y') }}<br>
                <strong>Customer Reference:</strong> {{ $armourer->customer->customer_ref ?? 'N/A' }}
            </div>

            Please arrange the required visit at your earliest convenience.<br><br>

            If you have already scheduled the visit, kindly disregard this reminder.

            <br><br>
            Thank you,<br>
            <strong>Your Security Team</strong>
        </div>
        <div class="footer">
            This is an automated email. Please do not reply to this message.
        </div>
    </div>
</body>
</html>
