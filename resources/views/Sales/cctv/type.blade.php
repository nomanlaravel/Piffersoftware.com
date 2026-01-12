<!-- Include your header and other content as needed -->
@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Cctv Type</h5>
        <form action="{{ route('cctvtype.store') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Type Name <br>
                    <input class="form-control" name="cctv_type" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h4>Existing Type</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Type Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cctvtypes as $cctvtype)
                <tr>
                    <td>{{ $cctvtype->cctv_type }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('cctvtype.delete', $cctvtype->id) }}" method="POST">
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
