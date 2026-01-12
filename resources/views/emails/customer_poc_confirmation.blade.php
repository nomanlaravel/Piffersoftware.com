<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer Registration Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; color: #333;">
    <div style="max-width: 700px; margin: auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h1 style="color: #4CAF50;">Welcome, {{ $customerName }}!</h1>
        <p style="font-size: 16px;">Thank you for registering with us. Your customer profile has been successfully created.</p>

        <p style="font-size: 16px;"><strong>Customer ID:</strong> {{ $customerId }}</p>

        <p style="font-size: 16px;">
            You can view your profile details here:<br>
            <a href="{{ $viewUrl }}" style="color: #2196F3; text-decoration: none;">{{ $viewUrl }}</a>
        </p>

        <hr style="border: none; border-top: 1px solid #ddd; margin: 30px 0;">

        <h3 style="color: #4CAF50;">Department Details:</h3>
        <ul style="list-style: none; padding-left: 0;">
            <li><strong>Type:</strong> {{ $department['dept_type'] ?? '-' }}</li>
            <li><strong>Name:</strong> {{ $department['dept_name'] ?? '-' }}</li>
            <li><strong>Email:</strong> {{ $department['dept_email'] ?? '-' }}</li>
            <li><strong>Cell:</strong> {{ $department['dept_cell'] ?? '-' }}</li>
            <li><strong>Designation:</strong> {{ $department['dept_desig'] ?? '-' }}</li>
            <li><strong>Notes:</strong> {{ $department['dept_notes'] ?? '-' }}</li>
            <li><strong>Address:</strong> {{ $department['dept_address'] ?? '-' }}</li>
            <li><strong>Office:</strong> {{ $department['dept_office'] ?? '-' }}</li>
            <li><strong>Floor:</strong> {{ $department['dept_floor'] ?? '-' }}</li>
            <li><strong>Building:</strong> {{ $department['dept_build'] ?? '-' }}</li>
            <li><strong>Block:</strong> {{ $department['dept_block'] ?? '-' }}</li>
            <li><strong>Area:</strong> {{ $department['dept_area'] ?? '-' }}</li>
            <li><strong>City:</strong> {{ $department['dept_city'] ?? '-' }}</li>
            <li><strong>PIN:</strong> {{ $department['dept_pin'] ?? '-' }}</li>
        </ul>

        <p style="margin-top: 40px;">Best regards,<br><strong>Your Company</strong></p>
    </div>
</body>
</html>
