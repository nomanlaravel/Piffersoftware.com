@include('layouts.header')
@yield('main')
<div class="customer_form">
@include('headerlogout')
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches"
                type="button" role="tab" aria-controls="branches" aria-selected="true"> Total Trainings
            </button>
        </li>
    </ul>
    <div class="row mt-3">
        <div class="col-lg-6">
            <h4><i><b>Import Trainings:</b></i></h4>
            <form action="{{ route('trainings.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
            </form>
        </div>

        <div class="col-lg-6">
            <h4><i><b>Search Training:</b></i></h4>

            <!-- Search Form -->
            <div class="input-group mb-3">
                <input type="text" id="training-search" class="form-control" placeholder="Search here...">
            </div>
        </div>
    </div>

    <div class="tab-content" id="myTabContent">
        <!--Toggle tab- Status Form-->
        <!--Main-->
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
            <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                     <i class="bi bi-arrow-left"></i>
                    </button>
            <h5 class="mt-3" style="font-weight: 700;">
                Training
            </h5>
            </div>
            <div class="mt-2 ">
                @if (auth()->user()->role != 'client')
                    <a href="{{url('posttrain')}}" class="btn btn-primary float-end mb-3">
                        <i class="fa-solid fa-plus"></i> New
                    </a>
                @endif
            </div>
            <form id="bulkDeleteForm">
                @csrf
                @method('DELETE')
            <div class="table-responsive mt-2">
                <div style="height: 380px; overflow-y: auto;">
                  <table class="table table-bordered table-striped table-fixed">
                      <thead>
                          <tr>
                              <th><input type="checkbox" id="selectAll"></th>
                              <th>Training Number</th>
                              <th>Venue</th>
                              <th>Name of Range</th>
                              <th>Training Start Date</th>
                              <th>Training End Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody id="training-table-body">
                          @foreach ($trainingData as $training)
                          <tr>
                              <td><input type="checkbox" class="itemCheckbox" name="ids[]" value="{{ $training->id }}"></td>
                              <td>{{$training->training_no}}</td>
                              <td>{{$training->venue}}</td>
                              <td>{{$training->name_of_range}}</td>
                              <td>{{$training->training_s_date}}</td>
                              <td>{{$training->training_e_date}}</td>
                              <td class="d-flex gap-2">
                                <a href="{{ route('viewtrain', ['id' => $training->id]) }}" class="btn btn-primary btn-sm" ><i class="fa-solid fa-eye"></i></a>
                                @if (auth()->user()->role != 'client')
                                    <a href="{{ route('edittrain', ['id' => $training->id]) }}" class="btn btn-info btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
                                @endif
                                <a href="{{ route('deletetrain', ['id' => $training->id]) }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                </div>
                <button type="button" id="deleteSelected" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                <a href="{{ route('trainings.trashed') }}" class="btn btn-primary btn-sm float-right" >Recently Deleted</a>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    document.getElementById('selectAll').addEventListener('change', function () {
    const checked = this.checked;
    document.querySelectorAll('.itemCheckbox').forEach(cb => cb.checked = checked);
});

document.getElementById('deleteSelected').addEventListener('click', function () {
    const checkboxes = document.querySelectorAll('.itemCheckbox:checked');
    if (checkboxes.length === 0) {
        alert('Please select at least one item to delete.');
        return;
    }

    if (!confirm('Are you sure you want to delete selected items?')) return;

    const ids = Array.from(checkboxes).map(cb => cb.value);

    fetch("{{ route('training.bulk-delete') }}", {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ ids })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert(data.error || 'Something went wrong.');
        }
    });
});

</script>
<script>
    $(document).ready(function () {
    $('#training-search').on('input', function () {
        var searchText = $(this).val().toLowerCase();

        $.ajax({
            url: "{{ route('search.trainings') }}",
            type: 'GET',
            data: { search: searchText },
            success: function (data) {
                if (data.html) {
                    $('#training-table-body').html(data.html);
                } else {
                    $('#training-table-body').html('<tr><td colspan="6">No results found</td></tr>');
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error: ", status, error);
                console.error("Response: ", xhr.responseText);
                $('#training-table-body').html('<tr><td colspan="6">There was an error processing your request.</td></tr>');
            }
        });
    });
});
</script>
