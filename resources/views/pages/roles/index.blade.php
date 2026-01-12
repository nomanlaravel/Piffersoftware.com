@include('layouts.header')
@yield('main')
<div class="customer_form">
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--<div class="row">-->
        <!--    <div class="col-12">-->
        <!--        <div class="row align-items-center justify-content-end">-->
        <!--            <div class="col-lg-3 col-xl-2 ">-->
        <!--                <a href="{{ route('roles.create') }}" class="btn btn-primary float-end mb-3 mb-lg-0"><i class='bx bxs-folder'></i>Add Rule</a>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="card">
            <div class="card-header ">
                <a class="btn btn-primary float-end " href="{{ route('roles.create') }}"><i class='bx bx-radio-circle'></i>Create New Role</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sr.#</th>
                                <th>Name</th>
                                <th>Permissions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $key=> $role)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$role->name}}</td>
                                <td>
                                    <div style="max-width: 100% !important;" class="d-flex justify-content-center flex-wrap">
                                        @foreach ($role->permissions as $perm)
                                        <span class="badge bg-primary m-1 text-capitalize py-2">
                                            {{ str_replace("_"," ",$perm->name) }}
                                        </span>
                                        @endforeach
                                    </div>
                                </td>

                                <td>
                                    <a href="{{route('roles.edit',  $role->id) }}" type="button" class="btn btn-success" >edit</a>

                                    <form action="{{ url('admin/roles/'. $role->id) }}"  method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm p-2 delete"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="editrule">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Rule</h5>
            </div>
            <div class="modal-body" id="info_body">
                <form class="form" action="{{ url('admin/roles/update') }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="rule_id" id="rule_id" >
                    <div class="row">
                      <div class="col-md-12 col-12">
                        <div class="form-group">
                          <label for="name" class="mb-2">Name</label>
                          <input type="text" id="name" class="form-control mb-4" name="name"  />
                        </div>
                      </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="success">Update</button>
              </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@push('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click', '.edit_rule', function(){
            var rule_id = $(this).val();
            $('#editrule').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/roles/" + rule_id + "/edit",
                success: function(response){
                    $("#rule_id").val(response.role.id);
                    $("#name").val(response.role.name);
                }
            });
        });
    });
/**
     * Check all the permissions
     */
     $("#checkPermissionAll").click(function() {
        if ($(this).is(':checked')) {
            // check all the checkbox
            $('input[type=checkbox]').prop('checked', true);
        } else {
            // un check all the checkbox
            $('input[type=checkbox]').prop('checked', false);
        }
    });

    function checkPermissionByGroup(className, checkThis) {
        const groupIdName = $("#" + checkThis.id);
        const classCheckBox = $('.' + className + ' input');
        if (groupIdName.is(':checked')) {
            classCheckBox.prop('checked', true);
        } else {
            classCheckBox.prop('checked', false);
        }

        implementAllChecked();
    }


    function checkSinglePermission(groupClassName, groupID, countTotalPermission) {

        const groupIDCheckBox = $('#' + groupID);

        // If there is any occurance where something is not selected then make selected = false

        if ($('.' + groupClassName + ' input:checked').length == countTotalPermission) {
            groupIDCheckBox.prop('checked', true);
        } else {
            groupIDCheckBox.prop('checked', false);
        }
        implementAllChecked();
    }


    function implementAllChecked() {
        const countPermissions = count($permissions);
        const countPermissionGroups = count($permission_groups);

        if ($('input[type="checkbox"]:checked').length > countPermissions + countPermissionGroups) {
            $('#checkPermissionAll').prop('checked', true);
        } else {
            $('#checkPermissionAll').prop('checked', false);
        }
    }
</script>
@endpush
