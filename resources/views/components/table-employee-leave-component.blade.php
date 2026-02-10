{{-- Modern Table Card for Employee Leaves --}}
<div class="table-card">
    <div class="table-card-header">
        <div>
            <div class="table-card-title">
                <i class="fas fa-calendar-check"></i>
                <span>Leave Requests History</span>
            </div>
            <p class="table-card-subtitle">Track and manage employee leave applications</p>
        </div>
        <button class="btn-refresh" id="btn-refresh-table">
            <i class="fas fa-sync-alt"></i>
            <span>Refresh Data</span>
        </button>
    </div>
    <div class="table-card-body">
        <div class="table-responsive">
            <table class="table table-hover el-table w-100">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Category</th>
                        <th>Duration</th>
                        <th>Total Days</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- DataTables populated via JS -->
                </tbody>
            </table>
        </div>
    </div>
</div>