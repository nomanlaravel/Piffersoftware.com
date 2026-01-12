<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer Registration Confirmation</title>
</head>
<body>
    <h1>Welcome, {{ $customerName }}!</h1>
    <p>Thank you for registering with us. Your customer profile has been successfully created.</p>
    <p><strong>Customer ID:</strong> {{ $customerId }}</p>
    <p>You can view your profile details here: <a href="{{ $viewUrl }}">{{ $viewUrl }}</a></p>
    <p>If you have any questions, please contact our support team.</p>
    <p>Best regards,<br>Your Company Name</p>
</body>
</html>
