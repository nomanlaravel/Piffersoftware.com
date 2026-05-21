@include('layouts.header')
@yield('main')

<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">
            Add Group — {{ $register->register_name }}
        </h5>

        <form action="{{ route('register.add.group.store', $register->id) }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-md-4">
                    Section Number
                    <input class="form-control" name="section_number" 
                           type="text" placeholder="e.g. 1" required>
                </div>
                <div class="col-md-4">
                    Group Title
                    <input class="form-control" name="title" 
                           type="text" placeholder="e.g. Regulatory Affairs" required>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('register.add.task.form', $register->id) }}" 
                   class="btn btn-secondary ml-2">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <h5 class="mt-4"><i>Existing Groups</i></h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Section #</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registerGroups as $group)
                <tr>
                    <td>{{ $group->section_number }}</td>
                    <td>{{ $group->title }}</td>
                    <td>
                        {{-- Edit Button --}}
                        <button type="button" class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editGroupModal{{ $group->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        {{-- Delete --}}
                        <form class="d-inline"
                              action="{{ route('register.group.delete', $group->id) }}"
                              method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                {{-- Edit Modal --}}
                <div class="modal fade" id="editGroupModal{{ $group->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('register.group.update', $group->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Group</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Section Number</label>
                                        <input type="text" name="section_number" class="form-control"
                                            value="{{ $group->section_number }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Group Title</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $group->title }}">
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

@include('layouts.footer')