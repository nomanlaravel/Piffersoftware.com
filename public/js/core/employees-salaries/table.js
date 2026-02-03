$(document).ready(function () {
    if ($('#salaryFormulasTable').length > 0) {
        window.esfTable = $('#salaryFormulasTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "/employee-payroll/employee-salaries/get-salaries",
                type: 'GET'
            },
            columns: [
                { data: 'id', name: 'id', title: 'ID' },
                { data: 'name', name: 'name', title: 'Name' },
                { data: 'employee_no', name: 'employee_no', title: 'Emp No' },
                { data: 'basic_salary', name: 'basic_salary', title: 'Basic Salary' },
                { data: 'next_increment', name: 'next_increment', title: 'Next Increment' },
                { data: 'status', name: 'status', title: 'Status', orderable: false, searchable: false },
                { data: 'action', name: 'action', title: 'Action', orderable: false, searchable: false }
            ],
            order: [[0, 'desc']],
            pageLength: 10,
            responsive: true
        });
    }
});
