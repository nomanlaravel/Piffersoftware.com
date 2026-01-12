<!-- Include your header and other content as needed -->
@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Attendence Machine Category</h5>
        <form action="{{ route('attendencemachinecategory.store') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Category Name <br>
                    <input class="form-control" name="attendence_machine_category" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h4>Existing  Category</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> Category Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attenmachcates as $attenmachcate)
                <tr>
                    <td>{{ $attenmachcate->attendence_machine_category }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('attendencemachinecategory.delete', $attenmachcate->id) }}" method="POST">
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
