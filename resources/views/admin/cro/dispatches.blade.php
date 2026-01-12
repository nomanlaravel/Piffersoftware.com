@include('layouts.header')
@yield('main')
<!-- Main content -->
<div class="customer_form">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cro  Name</th>
                <th>Lot Number</th>
                <th>Category</th>
                <th>Sub Category</th>
                <th>Article Name</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Price/Unit</th>
                <th>Total Price</th>
                <th>Dispatcher</th>
                <th>Receiver</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
    @foreach ($dispatches as $dispatch)
        <tr>
            <td>{{ $dispatch->cros->name }}</td>
            <td>{{ $dispatch->lot_number }}</td>
            <td>{{ $dispatch->category }}</td>
            <td>{{ $dispatch->sub_category }}</td>
            <td>{{ $dispatch->article_name }}</td>
            <td>{{ $dispatch->size }}</td>
            <td>{{ $dispatch->quantity }}</td>
            <td>{{ $dispatch->price_per_unit }}</td>
            <td>{{ $dispatch->total_price }}</td>
            <td>{{ $dispatch->dispatcher_name }}</td>
            <td>{{ $dispatch->receiver_name }}</td>
            <td>{{ $dispatch->date }}</td>
        </tr>
    @endforeach
</tbody>

        </tbody>
    </table>
</div>
