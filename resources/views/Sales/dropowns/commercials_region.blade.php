<!-- Include your header and other content as needed -->
@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add  Commercial Region</h5>
        <form action="{{ route('comercialregion.store') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Commercial Region Name <br>
                    <input class="form-control" name="commercial_region" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h4>Existing  Region</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> Region Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commercialsregions as $commercialsregion)
                <tr>
                    <td>{{ $commercialsregion->commercial_region }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('comercialregion.delete', $commercialsregion->id) }}" method="POST">
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
