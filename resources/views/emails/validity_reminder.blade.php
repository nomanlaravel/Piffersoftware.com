<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Validity Date Reminder</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f9fb; padding: 40px; color: #333;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <div style="border-bottom: 2px solid #4CAF50; padding-bottom: 10px; margin-bottom: 25px;">
            <h2 style="color: #4CAF50; margin: 0;">📅 Validity Reminder</h2>
        </div>

        <p style="font-size: 16px;">Dear <strong>{{ $hrm->name }}</strong>,</p>

        <p style="font-size: 15px; line-height: 1.6;">
            This is a reminder that your document is valid until:
        </p>

        <div style="background-color: #f1f1f1; padding: 12px 20px; border-left: 4px solid #4CAF50; margin: 20px 0; font-size: 16px;">
            <strong>{{ \Carbon\Carbon::parse($hrm->s_v_date)->format('d M, Y') }}</strong>
        </div>

        <p>Please ensure to renew before expiry.</p>

        <p style="margin-top: 30px; font-size: 15px;">
            Regards,<br>
            <strong style="color: #4CAF50;">HRM Department</strong>
        </p>
    </div>
</body>
</html>
