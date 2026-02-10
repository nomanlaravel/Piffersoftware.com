@include('layouts.header')

{{-- External CSS Vendors --}}
@include('vendors.data-tables')
@include('vendors.toastr')
@include('vendors.sweet-alerts')

{{-- Shared Attendance Module Styles --}}
@include('attendance_management.shared.styles')

<div class="customer_form">
    @include('headerlogout')

    {{-- Breadcrumb with Add Button --}}
    <x-bread-crumb-component :modal="true" modalId="add_leave" modalType="Leave Request" :showClock="'false'" />

    {{-- Success Alert --}}
    @if (Session::has('message') || isset($message))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check" aria-hidden="true"></i><strong class="ml-2">{{ Session::get('message') }}
                {{ $message ?? 'Done' }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    <x-table-employee-leave-component />

    <x-modal-add-employee-leave-component />

    <x-modal-leave-comment-component />
</div>

{{-- Shared Scripts --}}
@include('attendance_management.shared.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/core/employee-leaves/main.js') }}"></script>

@if(auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin' || auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin'))
    <script src="{{ asset('js/core/employee-leaves/table-admin.js') }}"></script>
@else
    <script src="{{ asset('js/core/employee-leaves/table.js') }}"></script>
@endif

@include('layouts.footer')