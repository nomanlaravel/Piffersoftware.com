@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">

    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Office Equipment</h5>
        <form action="{{ route('postadminequipment') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Equipment Name <br>
                    <input class="form-control" name="adminequipment_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Existing Categories -->
    <h2>Existing Equipments</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Equipments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($adminequipments as $adminequipment)
            <tr>
                <td>{{ $adminequipment->adminequipment_name }}</td>
                <td>

                    <form class="d-inline" action="{{ route('deleteadminequipment', $adminequipment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>






      
