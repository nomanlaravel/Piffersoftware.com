@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">

    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Category</h5>
        <form action="{{ route('posthrmcategory') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Category Name <br>
                    <input class="form-control" name="hrmcategory_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Existing Categories -->
    <h2>Existing Categories</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Categories</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->hrmcategory_name }}</td>
                <td>

                    <form class="d-inline" action="{{ route('deleteCategory', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Edit Category Form -->
    <div id="editCategoryForm" style="display: none;">
        <h2>Edit Category</h2>
        <form id="editForm" action="{{ route('updateCategory', 'placeholder_id') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="editedCategoryName">Category Name</label>
                <input type="text" class="form-control" id="editedCategoryName" name="hrmcategory_name" value="">
            </div>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
        <button class="btn btn-secondary" onclick="cancelEdit()">Cancel</button>
    </div>

    <script>
        function editCategory(categoryId, categoryName) {
          document.getElementById('editForm').action = '/categories/' + categoryId;
          document.getElementById('editedCategoryName').value = categoryName;
          document.getElementById('editCategoryForm').style.display = 'block';
          document.querySelector('ul').style.display = 'none';
        }

        function cancelEdit() {
          document.getElementById('editCategoryForm').style.display = 'none';
          document.querySelector('ul').style.display = 'block';
        }
    </script>
</div>






      
