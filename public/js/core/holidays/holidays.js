$(function () {
    const $form = $('#holidayForm');
    const $modal = $('#add_holiday');
    const $submitBtn = $('#holidaySubmitBtn');
    const $label = $('#addHolidayLabel');

    // Initialize DataTable
    console.log("Initializing Holidays Table...");
    const table = $(".holidays-table").DataTable({
        ajax: {
            url: "/holidays/get-holidays",
            dataSrc: ""
        },
        responsive: true,
        autoWidth: false,
        dom: '<"d-flex justify-content-between align-items-center p-3"lf>rt<"d-flex justify-content-between align-items-center p-3"ip>',
        columns: [
            {
                data: null,
                width: "5%",
                render: (data, type, row, meta) => meta.row + 1
            },
            {
                data: "title",
                render: data => `<strong class="text-dark">${data}</strong>`
            },
            {
                data: "date",
                className: "text-center",
                render: data => `<div class="text-muted"><i class="fas fa-calendar-alt me-1"></i> ${data}</div>`
            },
            {
                data: "is_paid",
                className: "text-center",
                render: data => {
                    const isPaid = String(data).toLowerCase() === 'paid' || data == 1 || data === true;
                    const cls = isPaid ? 'badge-active' : 'badge-held';
                    const text = isPaid ? 'Paid' : 'Unpaid';
                    const icon = isPaid ? 'fa-check-circle' : 'fa-times-circle';
                    return `<span class="badge ${cls}"><i class="fas ${icon} me-1"></i>${text}</span>`;
                }
            },
            {
                data: "type",
                className: "text-center",
                render: data => {
                    const type = data ? data.charAt(0).toUpperCase() + data.slice(1) : '';
                    return `<span class="badge badge-light border text-dark">${type}</span>`;
                }
            },
            {
                data: "created_by",
                render: data => `<span class="text-muted small"><i class="fas fa-user me-1"></i> ${data || 'System'}</span>`
            },
            {
                data: null,
                className: "text-end px-4",
                render: (data, type, row) => `
                    <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon" data-bs-toggle="dropdown" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                            <a class="dropdown-item btnEditHoliday" href="#" data-bs-toggle="modal" data-bs-target="#add_holiday" data-toggle="modal" data-target="#add_holiday"
                                data-id="${row.id}" 
                                data-title="${row.title}" 
                                data-date="${row.date}" 
                                data-is_paid="${row.is_paid}" 
                                data-type="${row.type}">
                                <i class="fas fa-edit me-2 text-primary"></i> Edit
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger btnDeleteHoliday" href="#" data-id="${row.id}">
                                <i class="fas fa-trash-alt me-2"></i> Delete
                            </a>
                        </div>
                    </div>
                `
            }
        ],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search holidays...",
            lengthMenu: "Show _MENU_",
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            }
        }
    });

    window.refreshTable = () => table.ajax.reload(null, false);

    // Modal Logic
    $modal.on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        if (!button.hasClass('btnEditHoliday')) {
            $form[0].reset();
            $('#holiday_id').val('');
            $label.text('Create New Holiday');
            $submitBtn.html('<i class="fas fa-save me-2"></i> Create Holiday');
        }
    });

    // Failsafe for modal backdrop issues
    $modal.on('hidden.bs.modal', function () {
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open').css('overflow', '');
    });

    // Edit Handler
    $(document).on('click', '.btnEditHoliday', function () {
        const id = $(this).data('id');
        const title = $(this).data('title');
        const date = $(this).data('date');
        const type = $(this).data('type');
        let is_paid = $(this).data('is_paid');

        // Normalize is_paid value for select
        if (typeof is_paid === 'string') {
            is_paid = is_paid.toLowerCase() === 'paid' ? 1 : 0;
        }

        $label.text('Edit Holiday');
        $submitBtn.html('<i class="fas fa-save me-2"></i> Update Holiday');

        $('#holiday_id').val(id);
        $('[name="holiday_title"]').val(title);
        $('[name="holiday_date"]').val(date);
        $('[name="type"]').val(type.toLowerCase());
        $('[name="is_paid"]').val(is_paid);
    });

    // Delete Handler
    $(document).on("click", ".btnDeleteHoliday", function (e) {
        e.preventDefault();
        const id = $(this).data('id');
        Swal.fire({
            title: "Delete this holiday?",
            text: "This action cannot be undone.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#f43f5e",
            confirmButtonText: "Yes, delete it",
            cancelButtonText: "Cancel",
            customClass: {
                confirmButton: 'btn btn-danger btn-lg px-4 rounded-3',
                cancelButton: 'btn btn-light btn-lg px-4 rounded-3 border ms-2'
            },
            buttonsStyling: false
        }).then(async (result) => {
            if (result.isConfirmed) {
                try {
                    const response = await fetch('/holidays/delete/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            'Accept': 'application/json'
                        }
                    });

                    const res = await response.json();
                    if (response.ok) {
                        toastr.success(res.message || 'Holiday deleted');
                        refreshTable();
                    } else {
                        toastr.error(res.message || 'Failed to delete');
                    }
                } catch (err) {
                    console.error(err);
                    toastr.error('An error occurred during deletion');
                }
            }
        });
    });

    // Form submission
    $form.on('submit', async function (e) {
        e.preventDefault();
        const btnOriginalText = $submitBtn.html();
        $submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i> Saving...');

        try {
            const formData = new FormData(this);
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (response.ok) {
                toastr.success(result.message || 'Saved successfully');
                $modal.modal('hide');
                refreshTable();
            } else {
                let errorMsg = result.message || 'Failed to save';
                if (result.errors) {
                    errorMsg = Object.values(result.errors).flat().join('<br>');
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: errorMsg
                });
            }
        } catch (error) {
            console.error(error);
            toastr.error('An error occurred');
        } finally {
            $submitBtn.prop('disabled', false).html(btnOriginalText);
        }
    });

    // Refresh button
    $('.btn-refresh').on('click', function () {
        const icon = $(this).find('i');
        icon.addClass('fa-spin');
        table.ajax.reload(() => {
            icon.removeClass('fa-spin');
            toastr.info('Data refreshed');
        }, false);
    });
});
