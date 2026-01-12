<!DOCTYPE html>
<html>
<head>
    <title>New Training Assignment</title>
</head>
<body>
    <h1>New Training Assignment</h1>

    @if ($recipientType === 'guard' && $guard)
        <p>Hello {{ $guard->name }} (ID: {{ $guard->id }}),</p>
        <p>You have been assigned to a new training session.</p>
    @elseif ($recipientType === 'customer' && $customer)
        <p>Hello {{ $customer->name ?? 'Customer' }},</p>
        <p>Your associated guard has been assigned to a new training session.</p>
    @else
        <p>Hello,</p>
        <p>A new training session has been assigned.</p>
    @endif

    <h2>Training Details:</h2>
    <p><strong>Training No:</strong> {{ $training->training_no }}</p>
    <p><strong>Training Region:</strong> {{ $training->training_region }}</p>
    <p><strong>Training Start Date:</strong> {{ $training->training_s_date }}</p>
    <p><strong>Training End Date:</strong> {{ $training->training_e_date }}</p>
    <p><strong>Training Course File:</strong> {{ $training->training_course_file }}</p>

    @if ($recipientType === 'guard' && $customer)
        <h2>Associated Customer:</h2>
        <p><strong>Name:</strong> {{ $customer->name ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $customer->email ?? 'N/A' }}</p>
        <!-- Add other customer fields as needed -->
    @elseif ($recipientType === 'customer' && $guard)
        <h2>Associated Guard:</h2>
        <p><strong>Name:</strong> {{ $guard->name ?? 'N/A' }}</p>
        <p><strong>ID:</strong> {{ $guard->id ?? 'N/A' }}</p>
        <!-- Add other guard fields as needed -->
    @endif

    <p>Please prepare accordingly and contact the Training Department for any questions.</p>

    <p>Best regards,<br>
    Training Department</p>
</body>
</html>
