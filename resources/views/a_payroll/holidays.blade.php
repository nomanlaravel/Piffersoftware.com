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
    <x-bread-crumb-component :modal="true" modalId="add_holiday" modalType="Holiday" :showClock="'false'" />

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Table Card --}}
    <div class="card table-card border-0">
        <div class="card-header bg-white border-bottom-0 py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-1">
                        <i class="fas fa-calendar-alt text-primary me-2"></i>Holidays Management
                    </h5>
                    <p class="text-muted small mb-0 ms-4 ps-1">Manage company holidays and weekends</p>
                </div>
                <div>
                    <button class="btn btn-refresh" onclick="refreshTable()">
                        <i class="fas fa-sync-alt me-2"></i>Refresh
                    </button>
                    <!-- Export buttons can be added here if needed -->
                </div>
            </div>
        </div>
        <div class="card-body px-0 pt-0">
            <div class="table-responsive">
                <table class="table table-hover holidays-table w-100" style="margin: 0 !important;">
                    <thead>
                        <tr>
                            <th class="px-4">Sr.</th>
                            <th>Holiday Title</th>
                            <th>Date</th>
                            <th>Is Paid</th>
                            <th>Type</th>
                            <th>Created by</th>
                            <th class="text-end px-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Data populated via DataTables --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- Modals --}}

    <!-- Create/Edit Holiday Modal -->
    <div class="modal fade" id="add_holiday" tabindex="-1" aria-labelledby="addHolidayLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form method="POST" action="{{route('dashboard.holidays.store')}}" class="modal-content border-0 shadow-xl"
                id="holidayForm" style="border-radius: 24px; overflow: hidden;">
                @csrf
                <div class="modal-header border-0 pb-0 position-relative"
                    style="background: linear-gradient(to bottom, #f8faff, #ffffff); padding: 32px 32px 10px;">
                    <div>
                        <h5 class="modal-title fw-bold" id="addHolidayLabel"
                            style="font-size: 24px; background: var(--primary-gradient); -webkit-background-clip: text; -webkit-text-fill-color: transparent; letter-spacing: -0.5px;">
                            Create New Holiday
                        </h5>
                        <p class="text-muted small mb-0 mt-2" style="font-size: 14px;">Configure holiday details
                            involved in payroll calculations</p>
                    </div>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"
                        style="position: absolute; right: 28px; top: 28px; background-size: 10px; opacity: 0.4; transition: all 0.2s;"></button>
                </div>

                <div class="modal-body p-4 pt-4">
                    <div id="methodField"></div>
                    <input type="hidden" name="id" id="holiday_id">

                    <div class="mb-4">
                        <label for="holiday_title" class="form-label fw-bold text-dark small text-uppercase mb-2"
                            style="letter-spacing: 0.5px;">Holiday Title</label>
                        <div class="input-group premium-input-group">
                            <span class="input-group-text border-0 bg-light px-3 text-muted"><i
                                    class="fas fa-heading"></i></span>
                            <input type="text" required class="form-control form-control-lg border-0 bg-light ps-3"
                                name="holiday_title" placeholder="e.g. Eid-ul-Fitr, Labor Day"
                                style="font-size: 15px; font-weight: 500; height: 50px;">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="holiday_date" class="form-label fw-bold text-dark small text-uppercase mb-2"
                            style="letter-spacing: 0.5px;">Date</label>
                        <div class="input-group premium-input-group">
                            <span class="input-group-text border-0 bg-light px-3 text-muted"><i
                                    class="fas fa-calendar-alt"></i></span>
                            <input type="date" required class="form-control form-control-lg border-0 bg-light ps-3"
                                name="holiday_date" style="font-size: 15px; font-weight: 500; height: 50px;">
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6 mb-2">
                            <label for="is_paid" class="form-label fw-bold text-dark small text-uppercase mb-2"
                                style="letter-spacing: 0.5px;">Payment Status</label>
                            <div class="input-group premium-input-group">
                                <span class="input-group-text border-0 bg-light px-3 text-muted">
                                    <i class="fas fa-money-bill-wave"></i>
                                </span>
                                <select name="is_paid" id="is_paid" required
                                    class="form-select border-0 ps-3 custom-select-premium"
                                    style="font-size: 15px; font-weight: 500; cursor: pointer; background-color: #f8f9fa; height: 50px;">
                                    <option value="" selected disabled>Select...</option>
                                    <option value="1">Paid</option>
                                    <option value="0">Unpaid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="type" class="form-label fw-bold text-dark small text-uppercase mb-2"
                                style="letter-spacing: 0.5px;">Holiday Type</label>
                            <div class="input-group premium-input-group">
                                <span class="input-group-text border-0 bg-light px-3 text-muted">
                                    <i class="fas fa-tag"></i>
                                </span>
                                <select name="type" id="type" required
                                    class="form-select border-0 ps-3 custom-select-premium"
                                    style="font-size: 15px; font-weight: 500; cursor: pointer; background-color: #f8f9fa; height: 50px;">
                                    <option value="" selected disabled>Select...</option>
                                    <option value="holiday">Holiday</option>
                                    <option value="weekend">Weekend</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 p-4 pt-0 justify-content-end gap-2">
                    <button type="button" class="btn btn-light btn-lg px-4 border" data-bs-dismiss="modal" data-dismiss="modal"
                        style="border-radius: 12px; font-weight: 600; color: #64748b; font-size: 15px;">Cancel</button>
                    <button type="submit" id="holidaySubmitBtn" class="btn btn-primary btn-lg px-5 shadow-lg"
                        style="border-radius: 12px; font-weight: 600; background: var(--primary-gradient); border: none; font-size: 15px; transition: transform 0.2s;">
                        <i class="fas fa-save me-2"></i> Create Holiday
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-modal-leave-comment-component />
</div>

<style>
    .premium-input-group {
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid #eef2f7;
    }

    .custom-select-premium {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2364748b' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C2.185 5.355 2.408 4.881 2.812 4.881h10.376c.404 0 .627.474.361.777l-4.796 5.482a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 12px;
        line-height: 1.5;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    /* Fix for invisible text due to height in some browsers */
    .custom-select-premium option {
        padding: 12px;
        font-weight: 500;
        background-color: white;
        color: #334155;
    }

    .custom-select-premium:focus {
        box-shadow: none;
        background-color: #fff !important;
    }

    /* Fix for invisible/broken dropdowns */
    .dropdown-menu {
        background-color: #ffffff !important;
        border: 1px solid rgba(0, 0, 0, 0.05) !important;
        display: none;
    }

    .dropdown-menu.show {
        display: block;
    }

    .dropdown-item {
        color: #334155 !important;
        background-color: transparent !important;
    }

    .dropdown-item:hover {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%) !important;
        color: #667eea !important;
    }

    .dropdown-item.text-danger {
        color: #ef4444 !important;
    }

    .dropdown-item.text-danger:hover {
        background: rgba(239, 68, 68, 0.05) !important;
    }
</style>

{{-- Shared Scripts --}}
@include('attendance_management.shared.scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/core/holidays/holidays.js') }}"></script>

@include('layouts.footer')