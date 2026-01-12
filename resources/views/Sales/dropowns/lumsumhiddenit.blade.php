<!-- Include your header and other content as needed -->
@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add  Commercial Lump Sum- Hidden WHT Category</h5>
        <form action="{{ route('comerciallumsumhiddencategory.store') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Commercial Lump Sum- Hidden WHT Category Name <br>
                    <input class="form-control" name="lumsumhidden_category" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h4>Existing  Lump Sum- Hidden WHT Category</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> Lump Sum- Hidden WHT Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commercialslumsumhiddencategorys as $commercialslumsumhiddencategory)
                <tr>
                    <td>{{ $commercialslumsumhiddencategory->lumsumhidden_category }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('comerciallumsumhiddencategory.delete', $commercialslumsumhiddencategory->id) }}" method="POST">
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
