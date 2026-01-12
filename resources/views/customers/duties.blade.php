<!-- Include your header and other content as needed -->
@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Duties</h5>
        <form action="{{ route('postduty') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Duty Name <br>
                    <input class="form-control" name="duty_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h2>Existing Duties</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Duties</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($duties as $duty)
                <tr>
                    <td>{{ $duty->duty_name }}</td>
                    <td>

                        <form class="d-inline" action="{{ route('deleteDuty', $duty->id) }}" method="POST">
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
