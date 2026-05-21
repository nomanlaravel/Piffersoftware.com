@include('layouts.header')
@yield('main')

<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Task — {{ $register->register_name }}</h5>
        <form action="{{ route('register.add.task.store', $register->id) }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-md-4">
                    <label for="task_group_id">Select Task Group</label>
                    <div class="input-group">
                        <select id="task_group_id" name="task_group_id" class="form-control" required>
                            <option value="">-- Select --</option>
                            @foreach($taskgroups as $group)
                                <option value="{{ $group->id }}">{{ $group->title }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <a href="{{ route('register.add.group.form', $register->id) }}" 
                               class="btn btn-success">
                                <i class="fa-solid fa-plus"></i> Add
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    Task Number
                    <input class="form-control" name="task_number" type="text" placeholder="e.g. 1.4">
                </div>
                <div class="col-lg-4">
                    Task Description
                    <input class="form-control" name="task_description" type="text" placeholder="...">
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('view.register', $register->id) }}" class="btn btn-secondary ml-2">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <h5 class="mt-4"><i>Existing Tasks</i></h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Task Number</th>
                <th>Task Description</th>
                <th>Group</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registerTasks as $task)
                <tr>
                    <td>{{ $task->task_number }}</td>
                    <td>{{ $task->task_description }}</td>
                    <td>{{ $task->group->title ?? '-' }}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $task->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <form class="d-inline"
                            action="{{ route('register.task.delete', $task->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </td>
                </tr>

                <div class="modal fade" id="editModal{{ $task->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('register.task.update', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Task</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Select Task Group</label>
                                        <select name="task_group_id" class="form-control">
                                            @foreach($taskgroups as $group)
                                                <option value="{{ $group->id }}"
                                                    {{ $task->group_id == $group->id ? 'selected' : '' }}>
                                                    {{ $group->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label>Task Number</label>
                                        <input type="text" name="task_number" class="form-control"
                                            value="{{ $task->task_number }}">
                                    </div>
                                    <div class="mb-3">
                                        <label>Task Description</label>
                                        <input type="text" name="task_description" class="form-control"
                                            value="{{ $task->task_description }}">
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