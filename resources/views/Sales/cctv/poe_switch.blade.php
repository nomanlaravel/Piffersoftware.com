<!-- Include your header and other content as needed -->
@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Cctv Poe switch</h5>
        <form action="{{ route('poeswitch.store') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Poe switch Name <br>
                    <input class="form-control" name="cctv_poe_switch" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h4>Existing  Poe switch</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> Poe switch Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cctvpoes as $cctvpoe)
                <tr>
                    <td>{{ $cctvpoe->cctv_poe_switch }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('poeswitch.delete', $cctvpoe->id) }}" method="POST">
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
