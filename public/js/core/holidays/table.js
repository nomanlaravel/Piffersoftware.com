$(function () {
    console.log("Initializing Admin Holidays Table...");

    var table = $(".holidays-table").DataTable({
        ajax: {
            url: "/holidays/get-holidays",
            dataSrc: ""
        },
        responsive: true,
        autoWidth: false,
        columns: [
            {
                data: "title",
                render: function (data) {
                    return `<strong class="text-dark">${data}</strong>`;
                }
            },
            {
                data: "created_by",
                render: function (data) {
                    return `<span class="text-muted">${data}</span>`;
                }
            },
            {
                data: 'date',
                className: 'text-center'
            },
            {
                data: "type",
                className: "text-center",
                render: function (data) {
                    return `<span class="badge badge-info">${data}</span>`;
                }
            },
            {
                data: "is_paid",
                className: "text-center",
                render: function (data) {
                    const cls = data === 'Paid' ? 'badge-success' : 'badge-secondary';
                    return `<span class="badge ${cls}">${data}</span>`;
                }
            }
        ],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search holidays...",
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
