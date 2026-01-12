@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">

    <div>
        <h5 class="mt-3" style="font-weight: 700;">Categories</h5>
        <form action="{{ route('inventory.subcategory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-4 spacing-right">
                    Store Belongs to <br>
                    <select class="form-control" name="category_id" style="width: 100%;" required>
                        <option value="">Select Store</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 spacing-right">
                    Category Name <br>
                    <input class="form-control" name="subcategory_name" type="text" placeholder="..." style="width: 100%;" required>
                </div>
                <div class="col-lg-4 spacing-right">
                    Category Image <br>
                    <input class="form-control" name="subcategory_image" type="file" placeholder="..." style="width: 100%;" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
         <div class="d-flex align-items-center mt-4">
          <button type="button" class="btn btn-link" onclick="history.back()"><i class="bi bi-arrow-left"></i></button>
              <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-weight: bold;">sub categories</h4>
        </div>
    <!-- Existing Subcategories -->
    <h5 class="mt-5">Existing categories :</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Category</th>
                <th>Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                @foreach($category->subcategories as $subcategory)
                    <tr>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $subcategory->subcategory_name }}</td>
                        <td><img src="{{ asset($subcategory->subcategory_image) }}" alt="{{ $subcategory->subcategory_name }}" width="50"></td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- Include jQuery (required for Select2) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    // Initialize Select2 on the select element
    $(document).ready(function() {
        $('#customer_name').select2({
            placeholder: "Search Customer",
            allowClear: true, // Allows removing the selection
            width: '100%', // Adjust the width as needed
        });
    });
</script>
