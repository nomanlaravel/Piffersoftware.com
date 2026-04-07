@include('layouts.header')

<div class="customer_form">
    <!-- Header -->
    <div class="modal-header border-0 p-0 mb-3" style="margin-top: 100px;">
        <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn btn-link p-0" style="color: rgb(38, 191, 148);" onclick="history.back()">
                <i class="bi bi-chevron-left fs-5"></i>
            </button>
            <h5 class="mb-0 fw-bold" style="color: grey;">
                Region Management
            </h5>
        </div>
    </div>

    <!-- Top Action Bar -->
    <div class="card-header d-flex justify-content-between align-items-center bg-white">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <h6 class="mb-0 text-muted"><i>Search:</i></h6>
            </div>
            <input type="text" id="region-search" class="form-control form-control-sm" placeholder="Search region...">
        </div>
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
            + New Region
        </button>
    </div>

    <!-- TABLE CARD -->
    <div class="card-body bg-white mb-4">
        <div class="table-responsive" style="max-height:380px; overflow-y:auto; border-radius:10px;">
            <table class="table table-bordered table-striped table-light align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width:80px;">#</th>
                        <th>Region Name</th>
                        <th class="text-center" style="width:200px;">Action</th>
                    </tr>
                </thead>
                <tbody id="region-table-body">
                    @forelse($regions as $index => $region)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $region->region_name }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- EDIT -->
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $region->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                    <!-- DELETE -->
                                    <form action="{{ route('admin.region.delete', $region->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No regions found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- CREATE MODAL -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('admin.region.store') }}" method="POST" class="modal-content shadow">
            @csrf
            <div class="modal-header bg-light text-dark">
                <h5 class="modal-title">Add Region</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label class="form-label fw-semibold">Region Name</label>
                <input type="text" name="region_name" class="form-control" placeholder="Enter region name" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Region</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT MODALS (generated for each region) -->
@foreach($regions as $region)
<div class="modal fade" id="editModal{{ $region->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{ route('admin.region.update', $region->id) }}" method="POST" class="modal-content shadow">
            @csrf
            @method('PUT')
            <div class="modal-header bg-light text-dark">
                <h5 class="modal-title">Edit Region</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <label class="form-label fw-semibold">Region Name</label>
                <input type="text" name="region_name" value="{{ $region->region_name }}" class="form-control" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endforeach

@include('layouts.footer')

<!-- SEARCH SCRIPT -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function () {
    $('#region-search').on('input', function () {
        var searchText = $(this).val().toLowerCase();
        $('#region-table-body tr').each(function () {
            var regionName = $(this).find('td:nth-child(2)').text().toLowerCase();
            if (regionName.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
});
</script>
