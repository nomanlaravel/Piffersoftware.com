@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Reporting Branches</h5>
        <form action="{{ route('postreporting') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Reporting Branch Name <br>
                    <input class="form-control" name="reporting_branch_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h5 class="mt-4"><i>Existing Branches</i></h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Reporting Branches</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportings as $reporting)
                <tr>
                    <td>{{ $reporting->reporting_branch_name }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('deleteReporting', $reporting->id) }}" method="POST">
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
