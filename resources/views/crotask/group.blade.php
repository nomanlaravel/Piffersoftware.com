@include('layouts.header')
@yield('main')
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Task Group</h5>
        <form action="{{ route('posttask_group') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Task Group Name
                    <input class="form-control" name="title" type="text" placeholder="..." style="width: 100%;">
                </div>
                <div class="col-lg-5 spacing-right">
                    Section Number
                    <input class="form-control" name="section_number" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h5 class="mt-4"><i>Existing Task Groups</i></h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Task Title</th>
                <th>Section Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taskgroups as $taskgroup)
                <tr>
                    <td>{{ $taskgroup->title }}</td>
                    <td>{{ $taskgroup->section_number }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $taskgroup->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <!-- Delete Form -->
                        <form class="d-inline" action="{{ route('deletetask_group', $taskgroup->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
                <!-- Edit Modal -->
                <div class="modal fade" id="editModal{{ $taskgroup->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $taskgroup->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{-- {{ route('updatetask_group', $taskgroup->id) }} --}}
                            <form action="{{ route('updatetask_group', $taskgroup->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $taskgroup->id }}">Edit Task Group</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Task Group Name</label>
                                        <input type="text" name="title" class="form-control" value="{{ $taskgroup->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Section Number</label>
                                        <input type="text" name="section_number" class="form-control" value="{{ $taskgroup->section_number }}" disabled>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
