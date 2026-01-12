<!-- Include your header and other content as needed -->
@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Giveaway Category</h5>
        <form action="{{ route('postsalesgive') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Giveaway Category Name <br>
                    <input class="form-control" name="salesGive" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h4>Existing Categories</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Categories</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salesgive as $give)
                <tr>
                    <td>{{ $give->salesGive }}</td>
                    <td>

                        <form class="d-inline" action="{{ route('destroysalesgive', $give->id) }}" method="POST">
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
