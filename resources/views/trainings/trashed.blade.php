@include('layouts.header')

@yield('main')
<div class="customer_form">

@include('headerlogout')
<div style="display:flex; column-gap:10px; align-items:center">
  <button type="button" class="btn btn-link" onclick="history.back()">
    <i class="bi bi-arrow-left"></i>
  </button>
    <h2>Recently Deleted Trainings</h2>
</div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($trashed->isEmpty())
        <p>No deleted trainings found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Training Name</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trashed as $training)
                <tr>
                    <td>{{ $training->id }}</td>
                    <td>{{ $training->type_of_training ?? 'N/A' }}</td>
                    <td>{{ $training->deleted_at }}</td>
                    <td>
                        <form action="{{ route('trainings.restore', $training->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
                        </form>

                        <form action="{{ route('trainings.forceDelete', $training->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure to permanently delete this?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete Permanently</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@include('layouts.footer')
