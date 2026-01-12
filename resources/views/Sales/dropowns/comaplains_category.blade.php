<!-- Include your header and other content as needed -->
@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add  Commercial Complains Category</h5>
        <form action="{{ route('comercialcomplainscategory.store') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Commercial Complains Category Name <br>
                    <input class="form-control" name="comaplains_category" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h4>Existing  Complains Category</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> Complains Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commercialscomplainscategorys as $commercialscomplainscategory)
                <tr>
                    <td>{{ $commercialscomplainscategory->comaplains_category }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('comercialcomplainscategory.delete', $commercialscomplainscategory->id) }}" method="POST">
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
