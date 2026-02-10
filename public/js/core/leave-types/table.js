$(function () {
    console.log("Initializing Premium Leave Types Table...");

    var table = $(".lv-table").DataTable({
        ajax: {
            url: "/leave-types/get-data",
            dataSrc: ""
        },
        responsive: true,
        autoWidth: false,
        dom: '<"d-flex justify-content-between align-items-center p-3"lf>rt<"d-flex justify-content-between align-items-center p-3"ip>',
        columns: [
            {
                data: "id",
                width: "5%"
            },
            {
                data: "name",
                render: function (data) {
                    return `<span class="font-weight-bold text-dark">${data}</span>`;
                }
            },
            {
                data: "allowed",
                render: function (data) {
                    return `<span class="badge badge-light border text-dark px-3">${data} Days</span>`;
                }
            },
            {
                data: "time_span",
                render: function (data) {
                    const icons = {
                        annualy: 'fa-calendar-check',
                        monthly: 'fa-calendar-alt',
                        once: 'fa-infinity'
                    };
                    const labels = {
                        annualy: 'Annual',
                        monthly: 'Monthly',
                        once: 'One-time'
                    };
                    return `<i class="fas ${icons[data] || 'fa-clock'} text-muted mr-2"></i> ${labels[data] || data}`;
                }
            },
            {
                data: "paid",
                render: function (data) {
                    return data
                        ? '<span class="badge text-success"><i class="fas fa-check-circle mr-1"></i> Paid</span>'
                        : '<span class="badge text-danger"><i class="fas fa-times-circle mr-1"></i> Unpaid</span>';
                }
            },
            {
                data: "status",
                render: function (data) {
                    const status = (data || '').toLowerCase();
                    const statusClass = status === 'active' ? 'text-success' : 'text-danger';
                    const icon = status === 'active' ? 'fa-check-circle' : 'fa-info-circle';
                    const text = status === 'active' ? 'Active' : 'Held';
                    return `<span class="badge ${statusClass}"><i class="fas ${icon} mr-1"></i> ${text}</span>`;
                }
            },
            {
                data: null,
                className: "text-right",
                render: function (data, type, row) {
                    return `
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right bg-white">
                                <a class="text-decoration-none d-flex justify-content-center align-items-center gap-3 edit-leave-type" href="javascript:void(0)" data-item='${JSON.stringify(row)}'>
                                    <i class="fas fa-pencil-alt"></i> Edit Details
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="text-decoration-none d-flex justify-content-center align-items-center gap-3 delete-leave-type text-danger" href="javascript:void(0)" data-id="${row.id}">
                                    <i class="fas fa-trash-alt text-danger"></i> Delete Record
                                </a>
                            </div>
                        </div>
                    `;
                }
            }
        ],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search leave types...",
            lengthMenu: "Show _MENU_",
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            }
        }
    });

    window.refreshTable = function () {
        table.ajax.reload();
    };

    // Refresh Button Click
    $(document).on("click", "#btn-refresh-table", function () {
        const btn = $(this);
        const icon = btn.find('i');

        icon.addClass('fa-spin');
        table.ajax.reload(null, false); // false to keep current paging

        setTimeout(() => {
            icon.removeClass('fa-spin');
            toastr.info("Data refreshed", "Updated");
        }, 800);
    });

    // Delete Handle
    $(document).on("click", ".delete-leave-type", function () {
        var id = $(this).data('id');
        Swal.fire({
            title: "Delete this leave type?",
            text: "This action cannot be undone. All associated employee leave records might be affected.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e53e3e",
            cancelButtonColor: "#718096",
            confirmButtonText: "Yes, delete it"
        }).then(async (result) => {
            if (result.isConfirmed) {
                try {
                    const response = await fetch('/leave-types/delete', {
                        method: 'POST',
                        body: JSON.stringify({ id: id }),
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    });

                    const result = await response.json();

                    if (response.ok) {
                        toastr.success(result.message || "Leave Type deleted successfully");
                        refreshTable();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Action Failed',
                            text: result.message || "Something went wrong while deleting."
                        });
                    }
                } catch (error) {
                    console.error('Delete Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Connection Error',
                        text: "Could not reach the server. Please check your connection."
                    });
                }
            }
        });
    });
});
