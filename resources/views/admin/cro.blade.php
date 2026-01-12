@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Cros</h5>
        <form action="{{ route('post.cro') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-4 ">
                    Cro Name <br>
                    <input class="form-control" name="name" type="text" placeholder="..." >
                </div>
                <div class="col-lg-4 ">
                     Cro Phone <br>
                    <input class="form-control" name="phone" type="text" placeholder="..." >
                </div>
                <div class="col-lg-4">
                     Region <br>
                    <input class="form-control" name="region" type="text" placeholder="..." >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h5 class="mt-4"><i>Existing Cros</i></h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> #</th>
                <th> Name</th>
                <th> Phone</th>
                <th> Region</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cros as $index=>$cro)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $cro->name }}</td>
                    <td>{{ $cro->phone }}</td>
                    <td>{{ $cro->region }}</td>
                    <td>
                        <a href="{{ route('dispatches.cro',$cro->id) }}" class="btn btn-primary">Dispatches</a>
                        <a href="{{ route('reports.cro',$cro->id) }}" class="btn btn-primary">Reports</a>
                        <form class="d-inline" action="{{ route('delete.cro', $cro->id) }}" method="POST">
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
