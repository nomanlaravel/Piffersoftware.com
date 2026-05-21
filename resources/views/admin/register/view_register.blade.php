@include('layouts.header')
@yield('main')

<div class="customer_form">
<div class="container-fluid mt-4">

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">{{ $register->register_name }}</h5>
            <div class="d-flex align-items-center">
                <input 
                    type="month" 
                    name="month" 
                    id="task-month" 
                    class="form-control mr-2"
                    value="{{ request('month') ?? now()->format('Y-m') }}"
                >
                {{-- Back button hata diya, Add Task button laga diya --}}
                <a href="{{ route('register.add.task.form', $register->id) }}" 
                   class="btn btn-success ml-2">
                    <i class="fa-solid fa-plus"></i> Add Task
                </a>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('store.register.tasks', $register->id) }}">
                @csrf
                <button type="button" id="toggle-all-checkboxes" class="btn btn-primary mb-3">
                    Check All
                </button>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sr. #</th>
                                <th style="min-width: 300px;">Task Description</th>
                                @for ($i = 1; $i <= $daysInMonth; $i++)
                                    <th>{{ $i }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                                <tr class="table-secondary font-weight-bold">
                                    <td>{{ $group->section_number }}</td>
                                    <td colspan="{{ $daysInMonth + 1 }}">{{ $group->title }}</td>
                                </tr>
                                {{-- tasks ki jagah registerTasks --}}
                                @foreach ($group->registerTasks as $task)
                                    <tr>
                                        <td>{{ $task->task_number }}</td>
                                        <td class="text-left">{{ $task->task_description }}</td>
                                        @for ($day = 1; $day <= $daysInMonth; $day++)
                                            @php
                                                $date = \Carbon\Carbon::parse($month)
                                                            ->startOfMonth()
                                                            ->addDays($day - 1)
                                                            ->toDateString();
                                                $assigned = $task->assignments
                                                                 ->firstWhere('assigned_date', $date);
                                            @endphp
                                            <td>
                                                <input type="checkbox" style="width:30px; height:30px"
                                                    name="tasks[{{ $task->id }}][{{ $date }}]"
                                                    {{ $assigned ? 'checked' : '' }}>
                                            </td>
                                        @endfor
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end align-items-center">
                    <button type="submit" class="btn btn-primary mr-3">Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
@include('layouts.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    let allChecked = false;

    $('#toggle-all-checkboxes').click(function () {
        allChecked = !allChecked;
        $('input[type="checkbox"]').prop('checked', allChecked);
        $(this).text(allChecked ? 'Uncheck All' : 'Check All');
    });

    // Month change hone par page reload
    $('#task-month').change(function () {
        let month = $(this).val();
        let url = new URL(window.location.href);
        url.searchParams.set('month', month);
        window.location.href = url.toString();
    });
});
</script>