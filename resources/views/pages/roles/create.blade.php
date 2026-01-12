@include('layouts.header')
@yield('main')
<div class="customer_form">
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Dashboard</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Role</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-header px-4 py-3">
                        <h5 class="mb-0">Add Role</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="content">

                            <form class="row g-3 needs-validation" action="{{ route('roles.store') }}"
                                method="POST" novalidate
                            >@csrf
                            <div class="body">
                             <div class="row">
                                <div class="col-xl-12 mx-auto">
                                    <div class="card-body p-4">
                                            <div class="col-md-12">
                                                <label for="bsValidation1" class="form-label">Role Name</label>
                                                <input type="text" class="form-control" name="name" id="bsValidation1" placeholder="Role"  required>
                                                <div class="invalid-feedback">
                                                    Please choose a Role Name.
                                                </div>
                                                @error('name')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 mx-auto">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="name">Permissions</label>
                                            <div class="form-check" >
                                                <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                                <label class="form-check-label" for="checkPermissionAll" style="margin-top: 10px; font-size:15px">All</label>
                                            </div>
                                            @error('permissions')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <hr>
                                            @php $i = 1; @endphp
                                            @foreach ($permission_groups as $group)
                                            <div class="form-group row d-flex">
                                                <div class="col-sm-12 d-flex mb-2">
                                                    <div class="form-check d-flex gap-3" style="align-items: center;">
                                                        <input type="checkbox" class="form-check-input mt-4 d-flex"   id="{{ $i }}Management"
                                                            value="{{ $group->name }}"
                                                            onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                        <label class="form-check-label text-capitalize d-flex" for="checkPermission"       style="margin-top: 30px; font-size:20px"
                                                        >{{ str_replace("_"," ",$group->name) }}</label>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 role-{{ $i }}-management-checkbox d-flex  justify-content-between gap-5">
                                                    @php
                                                    $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                                    $j = 1;
                                                    @endphp
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-check" style="display:flex;
                                                            align-items: center; ">
                                                        <input type="checkbox" class="form-check-input" name="permissions[]"
                                                            id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                        <label class="form-check-label text-capitalize" style="margin-top: 8px; margin-left:5px;"
                                                            for="checkPermission{{ $permission->id }}" >{{ str_replace("_"," ",$permission->name) }}</label>
                                                    </div>
                                                    @php $j++; @endphp
                                                    @endforeach
                                                    <br>
                                                </div>

                                            </div>
                                            @php $i++; @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

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
