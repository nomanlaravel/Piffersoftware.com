@include('layouts.header')
@yield('main')
<div class="customer_form">
    <form action="{{ route('update_access_role', $user->id) }}" method="POST">
        @csrf
        <div class="row mb-2 mt-3">
            <div class="col-lg-4 spacing-right ">
                Customer Name <br>
                <select id="customer_name" class="form-control" name="customer_name">
                    <option value="">Select Customer</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->customers_name }}">{{ $customer->customers_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-4 spacing-right">
                Email <br>
                <input class="form-control" name="email" type="email" value="{{ $user->email }}" placeholder="..." style="width: 100%;" required>
            </div>
            <div class="col-lg-4 spacing-right">
                Password <br>
                <input class="form-control" name="password" type="password" placeholder="..." style="width: 100%;" >
            </div>
        <div class="col-lg-4 spacing-right">
                Role <br>
                <select name="role" class="form-control" required>
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->name }}" @if($user->hasAnyRole($role->name)) selected @endif>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<!-- Google Fonts for Handwritten Font -->
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap" rel="stylesheet">

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2
        $('#customer_name').select2({
            placeholder: "Search Customer",
            allowClear: true,
            width: '100%',
        });
    });
</script>
