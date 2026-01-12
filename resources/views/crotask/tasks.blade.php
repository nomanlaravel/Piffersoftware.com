@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Task</h5>
        <form action="{{ route('postcro_tasks') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-md-4">
                    <label for="task_group_id">Select Task Group</label>
                    <div class="input-group">
                        <select id="task_group_id" name="task_group_id" class="form-control">
                            <option value=""></option>
                            @foreach($taskgroups as $taskgroup )
                            <option value="{{ $taskgroup->id }}">{{ $taskgroup->title }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <a href="{{ route('taskgroup') }}" class="btn btn-success">Add</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 ">
                    Task Number
                    <input class="form-control" name="task_number" type="text" placeholder="...">
                </div>
                <div class="col-lg-4 ">
                    Task Description
                    <input class="form-control" name="task_description" type="text" placeholder="...">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h5 class="mt-4"><i>Existing Tasks Groups</i></h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Task Description</th>
                <th>Task Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($crotasks as $crotask)
                <tr>
                    <td>{{ $crotask->task_description }}</td>
                    <td>{{ $crotask->task_number }}</td>
                    <td>
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $crotask->id }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <!-- Delete Form -->
                        <form class="d-inline"
                            action="{{ route('deletecro_tasks', $crotask->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
                <div class="modal fade" id="editModal{{ $crotask->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('updatecro_tasks', $crotask->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">  
                                    <h5 class="modal-title">Edit Task</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Select Task Group</label>
                                        <select name="task_group_id" class="form-control" disabled>
                                            @foreach($taskgroups as $taskgroup)
                                                <option value="{{ $taskgroup->id }}"
                                                    {{ $crotask->task_group_id == $taskgroup->id ? 'selected' : '' }}>
                                                    {{ $taskgroup->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3" >
                                        <label>Task Number</label>
                                        <input type="text" name="task_number" class="form-control"
                                            value="{{ $crotask->task_number }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label>Task Description</label>
                                        <input type="text" name="task_description" class="form-control"
                                            value="{{ $crotask->task_description }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              @endforeach
            </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#task_group_id').on('change', function() {
            let sectionNumber = $(this).val();
            if (sectionNumber) {
                $.ajax({
                    url: '/get-next-task-number/' + sectionNumber,
                    type: 'GET',
                    success: function(response) {
                        $('input[name="task_number"]').val(response.nextTaskNumber);
                    },
                    error: function() {
                        console.error('Error fetching next task number');
                    }
                });
            } else {
                $('input[name="task_number"]').val('');
            }
        });
    });
</script>