@include('layouts.header')
@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Register</h5>
        <form action="{{ route('post.register', $id) }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-md-4">
                    <label for="register_name">Register Name</label>
                    <input type="text" id="register_name" name="register_name"
                           class="form-control" placeholder="...">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>

    <h5 class="mt-4"><i>Existing Registers</i></h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Register Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registers as $register)
                <tr>
                    <td>{{ $register->register_name }}</td>
                    <td>
                        <!-- View Button -->
                        <a href="{{ route('view.register', $register->id) }}"
                           class="btn btn-info btn-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <!-- Edit Button -->
                        <button type="button" class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $register->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <!-- Delete Form -->
                        <form class="d-inline"
                              action="{{ route('delete.register', $register->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $register->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('update.register', $register->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Register</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Register Name</label>
                                        <input type="text" name="register_name" class="form-control"
                                               value="{{ $register->register_name }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>
