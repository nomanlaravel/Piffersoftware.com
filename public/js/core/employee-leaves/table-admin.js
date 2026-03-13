$(function () {
    console.log("Initializing Admin Leaves Table...");

    var table = $(".el-table").DataTable({
        ajax: {
            url: "/employee-leaves/get-data",
            dataSrc: ""
        },
        responsive: true,
        autoWidth: false,
        columns: [
            {
                data: "employee.name",
                render: function (data, type, row) {
                    return `<div>
                        <span class="font-weight-bold d-block text-dark">${data || 'Unknown'}</span>
                        <small class="text-muted">${row.employee?.email || ''}</small>
                    </div>`;
                }
            },
            {
                data: "leave_type.name",
                render: function (data) {
                    return `<span class="badge badge-light border border-secondary px-3 py-1">${data}</span>`;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `<div class="small">
                        <i class="far fa-calendar-alt text-muted mr-1"></i> ${row.start_date} <br>
                        <i class="fas fa-arrow-right text-muted mx-1" style="font-size: 0.7rem;"></i> to <br>
                        <i class="far fa-calendar-alt text-muted mr-1"></i> ${row.end_date}
                    </div>`;
                }
            },
            {
                data: "number_of_leaves",
                className: "text-center",
                render: function (data) {
                    return `<span class="font-weight-bold text-primary">${data} Days</span>`;
                }
            },
            {
                data: "status",
                render: function (data) {
                    const status = (data || '').toLowerCase();
                    let statusClass = 'text-warning';
                    let icon = 'fa-clock';

                    if (status === 'approved') {
                        statusClass = 'text-success';
                        icon = 'fa-check-circle';
                    } else if (status === 'rejected') {
                        statusClass = 'text-danger';
                        icon = 'fa-times-circle';
                    }

                    const text = status.charAt(0).toUpperCase() + status.slice(1);
                    return `<span class="badge ${statusClass}"><i class="fas ${icon} mr-1"></i> ${text}</span>`;
                }
            },
            {
                data: null,
                className: "text-right",
                render: function (data, type, row) {
                    let actions = '';
                    if (row.status === 'pending') {
                        actions = `
                            <a class="dropdown-item update-leave-status text-success" href="javascript:void(0)" data-id="${row.id}" data-action="approved">
                                <i class="fas fa-check-circle mr-2"></i> Approve Request
                            </a>
                            <a class="dropdown-item update-leave-status text-danger" href="javascript:void(0)" data-id="${row.id}" data-action="rejected">
                                <i class="fas fa-times-circle mr-2"></i> Reject Request
                            </a>
                            <div class="dropdown-divider" style="background-color: white;"></div>
                        `;
                    }
                    return `
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="background-color: white;">
                                ${actions}
                                <a class="dropdown-item delete-leave-request btn-inline-secondary text-center pt-2" style="margin-left: -2px; height: 45px; background: rgba(108,117,125,0.1); color: #6c757d; border:1px solid #6c757d; padding:4px 10px; border-radius:5px; display:inline-block;" href="javascript:void(0)" data-id="${row.id}">
                                    <i class="fas fa-trash-alt mr-4"></i>Delete Record
                                </a>
                            </div>
                        </div>
                    `;
                }
            }
        ],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records...",
            lengthMenu: "_MENU_",
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            }
        }
    });

    window.refreshTable = function () {
        table.ajax.reload(null, false);
    };

    // Generic Delete Handle
    $(document).on("click", ".delete-leave-request", function () {
        var id = $(this).data('id');
        Swal.fire({
            title: "Delete this record?",
            text: "This will permanently remove the leave request record.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#f43f5e",
            confirmButtonText: "Yes, delete it"
        }).then(async (result) => {
            if (result.isConfirmed) {
                try {
                    const response = await fetch('/employee-leaves/delete', {
                        method: 'POST',
                        body: JSON.stringify({ id: id }),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    });
                    const res = await response.json();
                    if (response.ok) {
                        toastr.success(res.message);
                        refreshTable();
                    } else {
                        toastr.error(res.message);
                    }
                } catch (e) { toastr.error("Connection error"); }
            }
        });
    });
});