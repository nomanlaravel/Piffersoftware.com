<!-- Include your header and other content as needed -->
@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">

    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Disease</h5>
        <form action="{{ route('postdisease') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Disease Name <br>
                    <input class="form-control" name="hrm_disease" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Existing Diseases -->
    <h2>Existing Diseases</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Disease Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($diseases as $disease)
            <td>{{ $disease->hrm_disease }}</td>
            <td>

                <form class="d-inline" action="{{ route('deleteDisease', $disease->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        @endforeach
      </tbody>
    </table>

    <!-- Edit Disease Form -->
    <div id="editDisease" style="display: none;">
        <h2>Edit Disease</h2>
        <form id="editDiseaseForm" action="{{ route('updateDisease', 'placeholder_id') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="editedDiseaseName">Disease Name</label>
                <input type="text" class="form-control" id="editedDiseaseName" name="hrm_disease" value="">
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button class="btn btn-secondary" onclick="cancelEditDisease()">Cancel</button>
        </form>
    </div>

    <script>
        function editDisease(diseaseId, diseaseName) {
            console.log('editDisease called with ID:', diseaseId, 'and Name:', diseaseName);
            
            // Replace 'placeholder_id' with the actual disease ID in the form action
            document.getElementById('editDiseaseForm').action = '/diseases/' + diseaseId;

            // Set the value of the input field with the disease name
            document.getElementById('editedDiseaseName').value = diseaseName;

            // Show the edit form and hide the existing diseases list
            document.getElementById('editDisease').style.display = 'block';
            document.querySelector('ul').style.display = 'none';
        }

        function cancelEditDisease() {
            // Hide the edit form and show the existing diseases list
            document.getElementById('editDiseaseForm').style.display = 'none';
            document.querySelector('ul').style.display = 'block';
        }
    </script>
</div>
