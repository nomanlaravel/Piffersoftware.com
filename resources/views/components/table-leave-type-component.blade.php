<div class="row">
    <div class="col-sm-12">
        <div class="card bg-white">
            <div class="card-header d-flex align-items-center bg-white border-bottom-0 pt-4 pb-0">
                <div class="d-flex align-items-center">
                    <div class="icon-box bg-light rounded-circle p-2 mr-3"
                        style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-list-ul text-primary"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-1">Configured Leave Types</h5>
                        <p class="text-muted small mb-0">System-wide leave settings and allowances</p>
                    </div>
                </div>
                <div class="ml-auto">
                    <button class="btn btn-sm btn-white shadow-sm rounded-pill px-3 border" id="btn-refresh-table">
                        <i class="fas fa-sync-alt mr-1 text-primary"></i> Refresh Data
                    </button>
                </div>
            </div>
            <div class="card-body p-4">
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
    </div>
</div>