<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contract Expiry Reminder</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #eef2f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .email-wrapper {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .email-header {
            background: linear-gradient(90deg, #565656, #9efaff);
            padding: 20px;
            text-align: center;
        }

        .email-header img {
            max-height: 50px;
        }

        .email-header h2 {
            margin: 10px 0 0;
            color: #fff;
            font-weight: 600;
        }

        .email-body {
            padding: 30px;
        }

        .email-body h3 {
            color: #333;
        }

        .highlight {
            color: #e74c3c;
            font-weight: bold;
        }

        p {
            color: #555;
            line-height: 1.6;
            margin: 15px 0;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            margin-bottom: 8px;
            color: #444;
        }

        .button {
            background-color: #28a745;
            color: #fff;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            margin-top: 25px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .button:hover {
            background-color: #218838;
        }

        .email-footer {
            background: #f8f9fa;
            text-align: center;
            padding: 20px;
            font-size: 13px;
            color: #999;
        }

        .email-footer a {
            color: #007bff;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-header">
            {{-- Optional Logo --}}
            <img src="https://piffersoftware.com/logo.png" alt="Company Logo">
            <h2>📅 Contract Expiry Reminder</h2>
        </div>
        <div class="email-body">
            <p>Dear <strong>{{ $customer->customers_name }}</strong>,</p>
            <p>We hope you're doing well. This is a kind reminder that your contract is approaching its expiry on
                <span class="highlight">{{ \Carbon\Carbon::parse($customer->c_end_date)->format('d M Y') }}</span>.
            </p>
            <h3>📄 Contract Details:</h3>
            <ul>
                <li><strong>Execution Date:</strong> {{ \Carbon\Carbon::parse($customer->c_e_date)->format('d M Y') }}</li>
                {{-- <li><strong>Renewal Date:</strong> {{ \Carbon\Carbon::parse($customer->c_r_date)->format('d M Y') }}</li>
                <li><strong>Reminder Note:</strong> {{ $customer->c_r_rem ?? 'N/A' }}</li> --}}
            </ul>

            <p>To avoid any interruption in services, please take action before the contract expiration date. You can renew your contract using the button below:</p>

            {{-- <a href="#" class="button">Renew Contract Now</a> --}}

            <p>If you need any assistance, feel free to reach out to our support team.</p>

            <p>Warm regards,<br><strong>Support Team</strong></p>
        </div>
        <div class="email-footer">
            &copy; {{ now()->year }} Your Company Name. All rights reserved.<br>
            <a href="mailto:support@pifferscompany.com">support@pifferscompany.com</a> | +1 (555) 123-4567
        </div>
    </div>
</body>
</html>
