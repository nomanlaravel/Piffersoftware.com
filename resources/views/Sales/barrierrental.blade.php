<!-- Include your header and other content as needed -->
@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Barrier Rental </h5>
        <form action="{{ route('barrierrental.store') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Rental Name <br>
                    <input class="form-control" name="br_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h4>Existing Rental</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Rental Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barrierrentals as $barrierrental)
                <tr>
                    <td>{{ $barrierrental->br_name }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('barrierrental.delete', $barrierrental->id) }}" method="POST">
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
