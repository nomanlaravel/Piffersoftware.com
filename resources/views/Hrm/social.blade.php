<!-- Include your header and other content as needed -->
@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Social City</h5>
        <form action="{{ route('postsocial') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Social City Name <br>
                    <input class="form-control" name="social_city" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Existing Social Cities -->
    <h2>Existing Social Cities</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Social City Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($socialCities as $socialCity)
                <tr>
                    <td>{{ $socialCity->social_city }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('deleteSocial', $socialCity->id) }}" method="POST">
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

<!-- Edit Social City Form -->
<div id="editSocialCityForm" style="display: none;">
    <h2>Edit Social City</h2>
    <form id="editSocialForm" action="{{ route('updateSocial', 'placeholder_id') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="editedSocialCityName">Social City Name</label>
            <input type="text" class="form-control" id="editedSocialCityName" name="social_city" value="">
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button class="btn btn-secondary" onclick="cancelEditSocial()">Cancel</button>
    </form>
</div>

<script>
    function editSocial(socialCityId, socialCityName) {
        // Replace 'placeholder_id' with the actual socialCity ID in the form action
        document.getElementById('editSocialForm').action = '/social/' + socialCityId;

        // Set the value of the input field with the socialCity name
        document.getElementById('editedSocialCityName').value = socialCityName;

        // Show the edit form and hide the existing socialCities table
        var editSocialCityForm = document.getElementById('editSocialCityForm');

        // Apply additional CSS styles to the edit form
        editSocialCityForm.style.display = 'block';
        editSocialCityForm.style.position = 'relative';
        editSocialCityForm.style.left = '21%';
        document.querySelector('table').style.display = 'none';
    }

    function cancelEditSocial() {
        // Hide the edit form and show the existing socialCities table
        document.getElementById('editSocialCityForm').style.display = 'none';
        document.querySelector('table').style.display = 'table';
    }
</script>
