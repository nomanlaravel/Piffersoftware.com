@include('layouts.header')

@yield('main')
<div class="customer_form">
   @include('headerlogout')
    <h3>{{ $hrm->name }} - Notifications</h3>

    @if($notifications->count() > 0)
    <ul class="list-group mt-3">
    @foreach($notifications as $notification)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('notification.read', $notification->id) }}" class="text-decoration-none text-dark w-100 d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $notification->title }}</strong><br>
                    {{ $notification->message }}
                    <br>
                    <small class="text-muted">{{ $notification->created_at->format('d M Y h:i A') }}</small>
                </div>
                @if(!$notification->is_read)
                    <span class="badge bg-danger">New</span>
                @else
                    <span class="badge bg-secondary">Read</span>
                @endif
            </a>
        </li>
    @endforeach
</ul>

    @else
        <p>No notifications found.</p>
    @endif
</div>

