<div class="row">
    <div class="col-sm-12">
        <div class="card bg-white shadow-sm border-0" style="border-radius: 15px;">
            <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                <div class="d-flex align-items-center">
                    <div class="icon-box bg-primary-light p-2 rounded-circle mr-3"
                        style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background: rgba(102, 126, 234, 0.1);">
                        <i class="fas fa-calendar-check text-primary"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0 font-weight-bold">Leave Requests History</h5>
                        <p class="text-muted small mb-0">Track and manage employee leave applications</p>
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
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
    </div>
</div>

<style>
    .bg-primary-light {
        background-color: rgba(102, 126, 234, 0.1);
    }
</style>