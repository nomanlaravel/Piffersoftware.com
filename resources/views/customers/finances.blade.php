<!-- Include your header and other content as needed -->
@include('layouts.header')

@yield('main')

<!-- Main content -->
<div class="customer_form">
    <div>
        <h5 class="mt-3" style="font-weight: 700;">Add Finances</h5>
        <form action="{{ route('postfinance') }}" method="POST">
            @csrf
            <div class="row mb-2 mt-3">
                <div class="col-lg-5 spacing-right">
                    Finance Name <br>
                    <input class="form-control" name="finance_name" type="text" placeholder="..." style="width: 100%;">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h2>Existing Finances</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Finances</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($finances as $finance)
                <tr>
                    <td>{{ $finance->finance_name }}</td>
                    <td>

                        <form class="d-inline" action="{{ route('deleteFinance', $finance->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
