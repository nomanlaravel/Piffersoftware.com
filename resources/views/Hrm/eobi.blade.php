<!-- Include your header and other content as needed -->
@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Fall In EOBI Cities</h5>
        <form action="{{ route('posteobi') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    EOBI City Name <br>
                    <input class="form-control" name="eobi_city" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Existing Fall In EOBI Cities -->
    <h2>Existing Fall In EOBI Cities</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>EOBI City Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eobiCities as $eobiCity)
                <tr>
                    <td>{{ $eobiCity->eobi_city }}</td>
                    <td>
                        <form class="d-inline" action="{{ route('deleteEobi', $eobiCity->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div id="editEOBIForm" style="display: none;">
        <h2>Edit EOBI City</h2>
        <form id="editEOBICityForm" action="{{ route('updateEobi', ['id' => '$eobiCity->id ']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="editedEOBICityName">EOBI City Name</label>
                <input type="text" class="form-control" id="editedEOBICityName" name="eobi_city" >
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button class="btn btn-secondary" onclick="cancelEditEOBICity()">Cancel</button>
        </form>
    </div>



    <script>
        function editEOBICity(eobiCityId, eobiCityName) {
            document.getElementById('editEOBICityForm').action = '/eobi/' + eobiCityId;
            document.getElementById('editedEOBICityName').value = eobiCityName;
            document.getElementById('editEOBIForm').style.display = 'block';
            document.querySelector('table').style.display = 'none';
        }

        function cancelEditEOBICity() {
            document.getElementById('editEOBICityForm').style.display = 'none';
            document.querySelector('table').style.display = 'table';
        }
    </script>
</div>
