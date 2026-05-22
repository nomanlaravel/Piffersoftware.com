@include('layouts.header')
@yield('main')
<div class="customer_form">
    @include('headerlogout')
    
    <div class="container-fluid my-4 px-4">
    
        <h2 class="text-center text-light bg-dark py-2">Score Card of Monthly Performance Report</h2>
        
        <div class="card p-3 mb-4 bg-light">
            <h5>Applied Filters</h5>
            <div class="row">
                @if(request('client_id'))
                <div class="col-md-3"><strong>Client ID:</strong> {{ request('client_id') }}</div>
                @endif
                @if(request('start_date'))
                <div class="col-md-3"><strong>Start Date:</strong> {{ request('start_date') }}</div>
                @endif
                @if(request('end_date'))
                <div class="col-md-3"><strong>End Date:</strong> {{ request('end_date') }}</div>
                @endif
                @if(request('month'))
                <div class="col-md-3"><strong>Month:</strong> {{ request('month') }}</div>
                @endif
                @if(!request('client_id') && !request('start_date') && !request('end_date') && !request('month'))
                <div class="col-md-12 text-muted">Showing all available score cards. Use the filters on the previous page to narrow results.</div>
                @endif
            </div>
            <div class="row mt-2">
                <div class="col-md-12 text-success">
                    <strong>Total Records Found:</strong> {{ $customers->count() }}
                </div>
            </div>
        </div>

        @if($customers->isEmpty())
            <div class="alert alert-warning text-center">No Score Card data found matching the selected filters.</div>
        @else
            <div class="card p-4 shadow-sm border-secondary">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle text-center" style="white-space: nowrap;">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Region</th>
                                <th>Site ID</th>
                                <th>Date</th>
                                <th>Month</th>
                                <th title="Screening & Hiring (Total: 20)">1. Screening & Hiring <br><small>(/20)</small></th>
                                <th title="Smart Turnout (Total: 15)">2. Smart Turnout <br><small>(/15)</small></th>
                                <th title="State of The Art Weapons (Total: 10)">3. Weapons <br><small>(/10)</small></th>
                                <th title="Periodical Trainings (Total: 13)">4. Trainings <br><small>(/13)</small></th>
                                <th title="Overall Excellence (Total: 15)">5. Overall Excellence <br><small>(/15)</small></th>
                                <th title="Customer Care (Total: 5)">6. Customer Care <br><small>(/5)</small></th>
                                <th title="PIFFERS Hedonistic Approach (Total: 22)">7. Hedonistic Approach <br><small>(/22)</small></th>
                                <th>Grand Total <br><small>(/100)</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $index => $customer)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-start">{{ $customer->scr_cus_name ?? $customer->customers_name }}</td>
                                <td>{{ $customer->scr_cus_region ?? $customer->customers_region }}</td>
                                <td>{{ $customer->scr_cus_site_id }}</td>
                                <td>{{ $customer->scr_cus_date }}</td>
                                <td>{{ $customer->f_month }}</td>
                                <td>{{ $customer->marks1_tm1 ?? 0 }}</td>
                                <td>{{ $customer->marks2_tm2 ?? 0 }}</td>
                                <td>{{ $customer->marks3_tm3 ?? 0 }}</td>
                                <td>{{ $customer->marks4_tm4 ?? 0 }}</td>
                                <td>{{ $customer->marks5_tm5 ?? 0 }}</td>
                                <td>{{ $customer->marks6_tm6 ?? 0 }}</td>
                                <td>{{ $customer->marks7_tm7 ?? 0 }}</td>
                                <td class="fw-bold fs-5 text-success">{{ $customer->marks_grand_total ?? 0 }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
