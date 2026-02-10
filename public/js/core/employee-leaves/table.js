$(function () {
    console.log("Initializing Employee Leaves Table...");

    var table = $(".el-table").DataTable({
        ajax: {
            url: "/employee-leaves/get-data",
            dataSrc: ""
        },
        responsive: true,
        autoWidth: false,
        dom: '<"d-flex justify-content-between align-items-center p-3"lf>rt<"d-flex justify-content-between align-items-center p-3"ip>',
        columns: [
            {
                data: "leave_type.name",
                render: function (data) {
                    return `<span class="font-weight-bold text-dark">${data}</span>`;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `<div class="small">
                        <i class="far fa-calendar-alt text-muted mr-1"></i> ${row.start_date} to ${row.end_date}
                    </div>`;
                }
            },
            {
                data: "number_of_leaves",
                className: "text-center",
                render: function (data) {
                    return `<span class="badge badge-light border px-3">${data} Days</span>`;
                }
            },
            {
                data: "description",
                render: function (data) {
                    return `<span class="text-muted small">${data || 'No description'}</span>`;
                }
            },
            // {
            //     data: "status",
            //     render: function (data) {
            //         const statusMap = {
            //             pending: 'badge-pending',
            //             approved: 'badge-active',
            //             rejected: 'badge-held'
            //         };
            //         return `<span class="badge ${statusMap[data]}">${data}</span>`;
            //     }
            // },
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
                            <a class="dropdown-item delete-leave-request text-danger" href="javascript:void(0)" data-id="${row.id}">
                                <i class="fas fa-trash-alt mr-2"></i> Cancel Request
                            </a>
                        `;
                    } else {
                        actions = `<span class="dropdown-item disabled text-muted">No actions</span>`;
                    }
                    return `
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                ${actions}
                            </div>
                        </div>
                    `;
                }
            }
        ],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search my leaves...",
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            }
        }
    });

    window.refreshTable = function () {
        table.ajax.reload(null, false);
    };

    $(document).on("click", ".delete-leave-request", function () {
        var id = $(this).data('id');
        Swal.fire({
            title: "Cancel this request?",
            text: "You can only cancel pending leave requests.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#f43f5e",
            confirmButtonText: "Yes, cancel it"
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
