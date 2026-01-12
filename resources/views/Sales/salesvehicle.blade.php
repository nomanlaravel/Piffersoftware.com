<!-- Include your header and other content as needed -->
@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Ownership Status</h5>
        <form action="{{ route('postsalesvehicle') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Status name <br>
                    <input class="form-control" name="salesVehicle" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h4>Existing Status</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salesvehicle as $vehicle)
                <tr>
                    <td>{{ $vehicle->salesVehicle }}</td>
                    <td>

                        <form class="d-inline" action="{{ route('destroysalesvehicle', $vehicle->id) }}" method="POST">
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
