@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Source Of Complaints</h5>
        <form action="{{ route('postsource') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Source Name <br>
                    <input class="form-control" name="source_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h2>Existing Sources</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Sources</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sources as $source)
                <tr>
                    <td>{{ $source->source_name }}</td>
                    <td>

                        <form class="d-inline" action="{{ route('deleteSource', $source->id) }}" method="POST">
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
