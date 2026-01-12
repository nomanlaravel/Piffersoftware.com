@include('layouts.header')
@yield('main')
<div class="customer_form">
<div class="container">
    <h2>Reminder Notifications</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Message</th>
                <th>Email</th>
                <th>Issue Date</th>
                <th>Read</th>
                <th>Sent At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reminders as $reminder)
                <tr>
                    <td>{{ $reminder->title }}</td>
                    <td>{{ $reminder->message }}</td>
                    <td>{{ $reminder->recipient_email }}</td>
                    <td>{{ $reminder->issue_date }}</td>
                    <td>{{ $reminder->is_read ? 'Yes' : 'No' }}</td>
                    <td>{{ $reminder->created_at->format('Y-m-d H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@include('layouts.footer')
