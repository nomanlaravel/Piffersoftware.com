<!-- Include your header and other content as needed -->
@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Category</h5>
        <form action="{{ route('securityequcategory.store') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Category Name <br>
                    <input class="form-control" name="security_equ_cate_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h4>Existing Category</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sec_equ_cates as $security)
                <tr>
                    <td>{{ $security->security_equ_cate_name }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('securityequcategory.delete', $security->id) }}" method="POST">
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
