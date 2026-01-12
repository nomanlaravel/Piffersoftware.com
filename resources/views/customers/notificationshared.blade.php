<!-- Include your header and other content as needed -->
@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Notifications Shared With</h5>
        <form action="{{ route('postnotificationshared') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Notification Shared To Name <br>
                    <input class="form-control" name="notification_shared_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h2>Existing Notifications</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Notifications Shared with</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notificationshared as $notification)
                <tr>
                    <td>{{ $notification->notification_shared_name }}</td>
                    <td>

                        <form class="d-inline" action="{{ route('deleteNotificationShared', $notification->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
