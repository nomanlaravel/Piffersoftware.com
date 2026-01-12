<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meeting Reminder</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f7f9fb; padding: 40px; color: #333;">

    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        <div style="border-bottom: 2px solid #4CAF50; padding-bottom: 10px; margin-bottom: 25px;">
            <h2 style="color: #4CAF50; margin: 0;">📅 Meeting Reminder</h2>
        </div>

        <p style="font-size: 16px;">Dear <strong>{{ $customer->customers_name }}</strong>,</p>

        <p style="font-size: 15px; line-height: 1.6;">
            This is a friendly reminder about your scheduled meeting taking place on:
        </p>

        <div style="background-color: #f1f1f1; padding: 12px 20px; border-left: 4px solid #4CAF50; margin: 20px 0; font-size: 16px;">
            <strong>{{ $meetingDate }}</strong>
        </div>

        <p style="font-size: 15px;">
            Please make sure to be prepared and join the meeting on time. If there are any updates or reschedules, kindly inform us in advance.
        </p>

        <p style="margin-top: 30px; font-size: 15px;">
            Best regards,<br>
            <strong style="color: #4CAF50;">Your Admin Team</strong>
        </p>
        <p style="text-align: center; font-size: 12px; color: #999; margin-top: 30px;">
            © {{ date('Y') }} Your Company Name. All rights reserved.
        </p>
    </div>


</body>
</html>
