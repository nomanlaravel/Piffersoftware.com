@include('layouts.header')

{{-- External CSS Vendors --}}
@include('vendors.data-tables')
@include('vendors.toastr')
@include('vendors.sweet-alerts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

{{-- Shared Attendance Module Styles --}}
@include('attendance_management.shared.styles')

<div class="customer_form">
    @include('headerlogout')

    {{-- Use reusable breadcrumb component --}}
    <x-bread-crumb-component :modal="true" modalId="add_leave_type" modalType="Leave Type" :showClock="'false'" />

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

    {{-- Leave Types Table Component --}}
    <x-table-leave-type-component />

    {{-- Add Leave Type Modal --}}
    <x-modal-add-leave-type />
</div>

{{-- Shared Scripts --}}
@include('attendance_management.shared.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/core/leave-types/main.js') }}"></script>
<script src="{{ asset('js/core/leave-types/table.js') }}"></script>
<script src="{{ asset('js/delete.js') }}"></script>

@include('layouts.footer')