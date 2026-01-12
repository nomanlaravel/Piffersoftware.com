@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Tagged To</h5>
        <form action="{{ route('postcomplaintto') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Tagged Name <br>
                    <input class="form-control" name="tagged_to_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h2>Existing Tagged Persons</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tagged To</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($complaintsto as $complaintsto)
                <tr>
                    <td>{{ $complaintsto->tagged_to_name }}</td>
                    <td>

                        <form class="d-inline" action="{{ route('deleteComplaintTo', $complaintsto->id) }}" method="POST">
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
