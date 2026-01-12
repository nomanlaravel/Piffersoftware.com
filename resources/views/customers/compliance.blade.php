<!-- Include your header and other content as needed -->
@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Compliance</h5>
        <form action="{{ route('postcompliance') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Compliance Name <br>
                    <input class="form-control" name="compliance_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h2>Existing Compliances</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Compliances</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compliances as $compliance)
                <tr>
                    <td>{{ $compliance->compliance_name }}</td>
                    <td>

                        <form class="d-inline" action="{{ route('deleteCompliance', $compliance->id) }}" method="POST">
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
