@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">

    <div>
        <h5 class="mt-3" style="font-weight: 700;">Stores</h5>
        <form action="{{ route('inventory.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-4 spacing-right">
                    Store Name <br>
                    <input class="form-control" name="category_name" type="text" placeholder="..." style="width: 100%;" required>
                </div>
                <div class="col-lg-4 spacing-right">
                    Store Image <br>
                    <input class="form-control" name="category_image" type="file" placeholder="..." style="width: 100%;" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>

        <div class="d-flex align-items-center mt-4">
          <button type="button" class="btn btn-link" onclick="history.back()"><i class="bi bi-arrow-left"></i></button>
              <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-weight: bold;">Category</h4>
        </div>

    <!-- Existing Categories -->
    <h5 class="mt-5">Existing Stores :</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td><img src="{{ asset($category->category_image) }}" alt="{{ $category->category_name }}" width="200"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


