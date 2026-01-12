<!-- Include your header and other content as needed -->
@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Cctv Backup Storage</h5>
        <form action="{{ route('backupstorage.store') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Backup Storage Name <br>
                    <input class="form-control" name="cctv_backup_storage" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h4>Existing Backup Storage</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Backup Storage Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cctvbackups as $cctvbackup)
                <tr>
                    <td>{{ $cctvbackup->cctv_backup_storage }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('backupstorage.delete', $cctvbackup->id) }}" method="POST">
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
