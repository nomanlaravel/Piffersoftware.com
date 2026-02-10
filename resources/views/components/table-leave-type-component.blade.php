{{-- Modern Table Card without Nested Structure --}}
<div class="table-card">
    <div class="table-card-header">
        <div>
            <div class="table-card-title">
                <i class="fas fa-calendar-alt"></i>
                <span>Leave Types Management</span>
            </div>
            <p class="table-card-subtitle">Configure and manage different types of leave policies for your organization
            </p>
        </div>
        <button class="btn-refresh" id="btn-refresh-table">
            <i class="fas fa-sync-alt"></i>
            <span>Refresh Data</span>
        </button>
    </div>
    <div class="table-card-body">
        <div class="table-responsive">
            <table class="table table-hover lv-table w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Leave Type</th>
                        <th>Allocation</th>
                        <th>Cycle</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th class="text-right">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- DataTables will populate this -->
                </tbody>
            </table>
        </div>
    </div>
</div>