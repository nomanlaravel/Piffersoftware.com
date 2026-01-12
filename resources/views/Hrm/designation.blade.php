<!-- Include your header and other content as needed -->
@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Designation</h5>
        <form action="{{ route('postdesignation') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Designation <br>
                    <input class="form-control" name="designation_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h2>Existing Designations</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Designations</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($designations as $designation)
                <tr>
                    <td>{{ $designation->designation_name }}</td>
                    <td>

                        <form class="d-inline" action="{{ route('deleteDesignation', $designation->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Edit Designation Form -->
    <div id="editDesignationForm" style="display: none;">
        <h2>Edit Designation</h2>
        <form id="editForm" action="{{ route('updateDesignation', 'placeholder_id') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="editedDesignationName">Designation Name</label>
                <input type="text" class="form-control" id="editedDesignationName" name="designation_name" value="">
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button class="btn btn-secondary" onclick="cancelEditDesignation()">Cancel</button>
        </form>
    </div>

    <script>
        function editDesignation(designationId, designationName) {
            document.getElementById('editForm').action = '/designation/' + designationId;
            document.getElementById('editedDesignationName').value = designationName;
            document.getElementById('editDesignationForm').style.display = 'block';
            document.querySelector('table').style.display = 'none';
        }

        function cancelEditDesignation() {
            document.getElementById('editDesignationForm').style.display = 'none';
            document.querySelector('table').style.display = 'table';
        }
    </script>

</div>
