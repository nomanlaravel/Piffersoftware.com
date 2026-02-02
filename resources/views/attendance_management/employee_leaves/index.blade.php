@include('layouts.header')

@push('css')

    @include('vendors.data-tables')
    @include('vendors.toastr')
    @include('vendors.sweet-alerts')

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --accent-color: #667eea;
            --text-main: #2d3748;
            --text-muted: #718096;
        }

        /* Use standard Bootstrap utility classes for badges to ensure visibility */
        .badge {
            padding: 0.5em 0.8em;
            border-radius: 8px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.7rem;
            min-width: 90px;
            text-align: center;
        }

        .btn-premium {
            background: var(--primary-gradient);
            color: white;
            border: none;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
        }

        .btn-premium:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.5);
            color: white;
        }

        .modal-premium {
            border-radius: 20px;
            border: none;
            overflow: hidden;
        }

        .modal-premium .modal-header {
            background: #f8fafc;
            border-bottom: 1px solid #edf2f7;
            padding: 1.5rem;
        }

        .form-control-premium {
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
            transition: all 0.2s;
        }

        .form-control-premium:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-label-premium {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }
    </style>

@endpush

<div class="customer_form">
    @include('headerlogout')

    {{-- Header Section --}}
    <div class="row align-items-center mb-4">
        <div class="col">
            <div class="d-flex align-items-center">
                <div class="bg-primary rounded-circle p-2 mr-3 d-flex align-items-center justify-content-center shadow-sm"
                    style="width: 50px; height: 50px; background: var(--primary-gradient) !important;">
                    <i class="fas fa-calendar-check text-primary fa-lg"></i>
                </div>
                <div>
                    <h2 class="card-title mb-0" style="font-size: 1.75rem; line-height: 1.2;">Leave Requests</h2>
                    <p class="text-muted small mb-0">Manage and track employee leave applications</p>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <button class="btn btn-premium shadow-lg px-4 py-2" data-toggle="modal" data-target="#add_leave">
                <i class="fas fa-paper-plane mr-2"></i> Submit Leave Request
            </button>
        </div>
    </div>

    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-transparent p-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}" class="text-muted">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#" class="text-muted">Operations</a></li>
            <li class="breadcrumb-item active text-primary font-weight-bold" aria-current="page">Employee Leaves</li>
        </ol>
    </nav>

    <x-table-employee-leave-component />

    <x-modal-add-employee-leave-component />

    <x-modal-leave-comment-component />
</div>

@push('js')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/core/employee-leaves/main.js') }}"></script>

    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'superadmin' || auth()->user()->hasRole('Super Admin') || auth()->user()->hasRole('Admin'))
        <script src="{{ asset('js/core/employee-leaves/table-admin.js') }}"></script>
    @else
        <script src="{{ asset('js/core/employee-leaves/table.js') }}"></script>
    @endif
@endpush

@include('layouts.footer')