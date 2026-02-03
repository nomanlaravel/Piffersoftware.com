<!-- Add Salary Formula Modal -->
<div id="add_salary_formula" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content overflow-hidden border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header border-0 bg-light py-3 px-4">
                <h5 class="modal-title font-weight-bold text-primary">
                    <i class="fas fa-file-invoice-dollar mr-2"></i>Set Salary of Employee
                </h5>
                <button type="button" class="btn-close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="addMonthlySalaryForm" action="{{ route('dashboard.employee-payroll.salaries.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="esf-errors-print mb-3"></div>
                    
                    <input type="hidden" name="employee_id">

                    <!-- Bank Detail Section -->
                    <div class="section-container mb-4 pb-3 border-bottom">
                        <h6 class="text-uppercase text-muted font-weight-bold small mb-3">
                            <i class="fas fa-university mr-1"></i> 1. Bank Information
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold">Account Title<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-sm border-0 bg-light" type="text" placeholder="Full Name on Account" name="account_title" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold">Account Number<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-sm border-0 bg-light" type="text" placeholder="IBAN or Account No." name="account_number" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold">Bank Name<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-sm border-0 bg-light" type="text" placeholder="e.g. HBL, Alfalah" name="bank_name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold">Branch Name<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-sm border-0 bg-light" type="text" placeholder="Branch location" name="branch_name" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Salary Detail Section -->
                    <div class="section-container mb-4">
                        <h6 class="text-uppercase text-muted font-weight-bold small mb-3">
                            <i class="fas fa-coins mr-1"></i> 2. Salary Breakdown
                        </h6>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group mb-0 p-3 bg-primary-light rounded shadow-sm border">
                                    <label class="small font-weight-bold">Gross Basic Salary (Monthly)<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text border-0 bg-transparent">₨</span></div>
                                        <input class="form-control font-weight-bold text-primary border-0 bg-transparent" type="number" placeholder="0.00" name="basic_salary" style="font-size: 1.2rem;" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="row no-gutters h-100">
                                    <div class="col-4 px-1">
                                        <div class="form-group mb-0 text-center p-2 bg-light rounded h-100 border">
                                            <label class="x-small d-block text-muted mb-1">Per Day</label>
                                            <input class="form-control form-control-sm text-center border-0 bg-transparent p-0 font-weight-bold" type="text" name="per_day" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4 px-1">
                                        <div class="form-group mb-0 text-center p-2 bg-light rounded h-100 border">
                                            <label class="x-small d-block text-muted mb-1">Per Hour</label>
                                            <input class="form-control form-control-sm text-center border-0 bg-transparent p-0 font-weight-bold" type="text" name="per_hour" readonly>
                                        </div>
                                    </div>
                                    <div class="col-4 px-1">
                                        <div class="form-group mb-0 text-center p-2 bg-light rounded h-100 border">
                                            <label class="x-small d-block text-muted mb-1">Per Min</label>
                                            <input class="form-control form-control-sm text-center border-0 bg-transparent p-0 font-weight-bold" type="text" name="per_minute" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pt-2">
                             @foreach(['house_allowance' => 'House', 'mess_allowance' => 'Mess', 'travelling_allowance' => 'Travelling', 'medical_allowance' => 'Medical'] as $name => $label)
                             <div class="col-md-3 col-6 mb-3">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold">{{ $label }}</label>
                                    <input class="form-control form-control-sm border-0 bg-light" type="number" placeholder="0.00" name="{{ $name }}" readonly>
                                </div>
                             </div>
                             @endforeach
                        </div>
                    </div>

                    <!-- Scheduling Section -->
                    <div class="section-container p-3 rounded" style="background: rgba(79, 70, 229, 0.05);">
                        <div class="row align-items-end">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold text-indigo"><i class="far fa-calendar-alt mr-1"></i> Salary Start Date<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control form-control-sm border-indigo" name="salary_start" value="{{ date('Y-m-01') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-0">
                                    <label class="small font-weight-bold text-indigo"><i class="fas fa-redo mr-1"></i> Increment Frequency<span class="text-danger">*</span></label>
                                    <select name="increment_time" id="incrementMonths" class="form-control form-control-sm border-indigo" required>
                                        <option value="">Choose Interval...</option>
                                        <option value="3">Every 3 Months</option>
                                        <option value="6">Every 6 Months</option>
                                        <option value="12">Annually (12 Months)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4 pt-2">
                        <button type="submit" class="btn btn-primary btn-lg submit-btn px-5 shadow-sm" style="border-radius: 12px; font-size: 1rem; font-weight: 700;">
                            Generate Salary Formula
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-primary-light { background: #eef2ff; }
    .text-indigo { color: #4f46e5; }
    .border-indigo { border: 1px solid #c7d2fe !important; }
    .x-small { font-size: 0.65rem; text-transform: uppercase; letter-spacing: 0.5px; }
    .form-control:focus { background-color: #fff !important; box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1) !important; border-color: #4f46e5 !important; }
    .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 20px rgba(79, 70, 229, 0.3) !important; }
</style>

<!-- Add Employee Salary Modal -->
@push('extended-js')
    <script>
        $(document).on('keyup', '[name=basic_salary]', function () {
            const basicSalary = parseFloat($(this).val()) || 0;

            const now = new Date();
            const year = now.getFullYear();
            const month = now.getMonth() + 1;
            const daysInMonth = new Date(year, month, 0).getDate();

            const perDay = Math.floor(basicSalary / daysInMonth);
            const perHour = Math.floor(perDay / 8);
            const perMinute = (perHour / 60).toFixed(2);
            
            $('[name=per_day]').val(perDay);
            $('[name=per_hour]').val(perHour);
            $('[name=per_minute]').val(perMinute);
        });
    </script>
@endpush