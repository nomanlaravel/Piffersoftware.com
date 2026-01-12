<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Platform</title>
</head>
<body>
    <h2>Hello {{ $user->customer_name ?? 'User' }},</h2>
    <p>Thank you for registering with us.</p>
    <p>Here are your login credentials:</p>
    <ul>
        <li><strong>Email:</strong> {{ $user->email }}</li>
        <li><strong>Password:</strong> {{ $rawPassword }}</li>
    </ul>
    <p>Please keep this information safe and change your password after login.</p>
</body>
</html>
