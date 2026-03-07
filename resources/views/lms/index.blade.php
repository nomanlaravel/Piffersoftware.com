@include('layouts.header')

<style>
    .lms-card {
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        padding: 2rem;
        transition: transform 0.3s ease;
        border: none;
    }

    .lms-card:hover {
        transform: translateY(-5px);
    }

    .form-control {
        border-radius: 8px;
        padding: 10px 15px;
    }

    .btn-lms {
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    /* Layout Adjustments */
    #main {
        padding: 16px;
        transition: margin-right .5s;
    }

    @media (min-width: 992px) {
        #main {
            margin-left: 17%;
            width: 82%;
        }
    }

    @media (max-width: 991px) {
        #main {
            margin-left: 0;
            width: 100%;
        }
    }

    /* HRM Dropdown */
    .custom-dropdown-container {
        position: relative;
    }

    .custom-dropdown-header {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px 12px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .custom-dropdown-menu {
        position: absolute;
        width: 100%;
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-top: 4px;
        z-index: 1000;
        display: none;
        max-height: 300px;
        overflow-y: auto;
    }

    .custom-dropdown-menu.show {
        display: block;
    }

    .hrm-option {
        padding: 8px 12px;
        cursor: pointer;
    }

    .hrm-option:hover {
        background-color: #f0f4ff;
    }

    .selected-hrm {
        font-weight: 600;
        color: #333;
    }
</style>

<div id="main">
    <!-- Sidebar Toggle -->
    <div style="text-align: right; margin-bottom: 20px;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-weight-bold" style="color: #444;">LMS Management Dashboard</h2>
            <p class="text-muted">Manage your Learning Management System access and users</p>
        </div>

        {{-- Admin Section --}}
        @if(auth()->check() && (auth()->user()->hasRole('Super Admin') || auth()->user()->role === 'admin' || auth()->user()->role === 'Admin'))
            <div class="row mb-5">
                <div class="col-md-6 offset-md-3">
                    <div class="card lms-card bg-white">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-4" style="color: #333; font-weight: 700;">
                                <i class="bi bi-person-plus-fill mr-2" style="color: #69c430;"></i> Create LMS Account
                            </h4>
                            <p class="text-center text-muted small mb-4">Create a new user account directly involved with
                                the LMS.</p>

                            <form id="lms-create-user-form">
                                @csrf

                                <!-- HRM Searchable Dropdown -->
                                <div class="form-group mb-3">
                                    <label for="lms_name" class="form-label font-weight-bold ml-1">Select HRM</label>
                                    <div class="custom-dropdown-container">
                                        <div class="custom-dropdown-header" id="hrmDropdownHeader">
                                            <span id="selectedHrm">Select HRM...</span>
                                            <i class="bi bi-chevron-down"></i>
                                        </div>
                                        <div class="custom-dropdown-menu" id="hrmDropdownMenu">
                                            <input type="text" id="hrmSearch" class="form-control mb-2" placeholder="Search HRM...">
                                            @foreach($hrms as $hrm)
                                                <div class="hrm-option" data-id="{{ $hrm->id }}" data-name="{{ strtolower($hrm->name) }}">
                                                    {{ $hrm->name }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <input type="hidden" id="lms_name" name="name">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="lms_email" class="form-label font-weight-bold ml-1">Email</label>
                                    <input type="email" class="form-control" id="lms_email" name="email"
                                           placeholder="user@gmail.com" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="lms_password" class="form-label font-weight-bold ml-1">Password</label>
                                    <input type="password" class="form-control" id="lms_password" name="password"
                                           placeholder="••••••••" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="lms_faculty" class="form-label font-weight-bold ml-1">Select Faculty</label>
                                    <select class="form-control py-2" id="lms_faculty" name="faculty" required>
                                        <option value="" selected>Choose Faculty</option>
                                        @foreach($faculties as $faculty)
                                            <option value="{{ $faculty['id'] }}">{{ $faculty['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block btn-lms w-100"
                                        style="background-color: #69c430; border: none; padding: 12px;">
                                    Create Account
                                </button>
                            </form>
                            <div id="lms-feedback" class="mt-3"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- LMS Users Table --}}
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card lms-card bg-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="card-title mb-0" style="font-weight: 700;">
                                    <i class="bi bi-people-fill mr-2" style="color: #69c430;"></i> Registered LMS Users
                                </h4>
                                <button class="btn btn-sm btn-outline-secondary" onclick="fetchLmsUsers()"><i
                                        class="bi bi-arrow-clockwise"></i> Refresh</button>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="lmsUsersTable">
                                    <thead style="background-color: #f8f9fa;">
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody id="lms-users-table-body">
                                    @if(count($lmsUsers) > 0)
                                        @foreach($lmsUsers as $user)
                                            <tr>
                                                <td>{{ $user['id'] }}</td>
                                                <td>{{ $user['email'] }}</td>
                                                <td>{{ $user['created_at'] }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-info text-white me-1">Details</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">No users found.</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Direct Link Section --}}
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="card lms-card" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                    <div class="card-body">
                        <h3 class="mb-3">Go to LMS System</h3>
                        <p class="mb-4">Access the main Learning Management System interface directly.</p>
                        <a class="btn btn-lg btn-outline-success btn-lms px-5 py-3"
                           href="https://piffersoftware.com/lms/erp-register" target="_blank"
                           style="border-width: 2px; font-size: 1.25rem; display: inline-flex; align-items: center; gap: 10px;">
                            <span>Access LMS Portal</span> <i class="bi bi-box-arrow-up-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="mySidebar" class="sidebar admin-setting">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
    <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration Setting</a>
    <a href="{{ url('admin') }}"> <i class="bi bi-people mr-2"></i> Manage Admin/Employees</a>
    <hr>
    <a href="{{ url('logout') }}"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
</div>

<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginRight = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
    }

    // Fetch LMS Users
    function fetchLmsUsers() {
        const tbody = document.getElementById('lms-users-table-body');
        if (!tbody) return;

        tbody.innerHTML = '<tr><td colspan="4" class="text-center py-4 text-muted"><div class="spinner-border spinner-border-sm text-success" role="status"></div> Refreshing data...</td></tr>';

        fetch('{{ route("dashboard.lms.users") }}')
        .then(response => response.json())
        .then(data => {
            const users = data.users || [];
            let rows = '';
            if (users.length > 0) {
                users.forEach(user => {
                    rows += `<tr>
                        <td>${user.id}</td>
                        <td>${user.email}</td>
                        <td>${user.created_at || 'N/A'}</td>
                        <td>
                            <button class="btn btn-sm btn-info text-white me-1">Details</button>
                        </td>
                    </tr>`;
                });
            } else {
                rows = '<tr><td colspan="4" class="text-center text-muted">No users found.</td></tr>';
            }
            tbody.innerHTML = rows;
        })
        .catch(error => {
            tbody.innerHTML = '<tr><td colspan="4" class="text-center text-danger">Failed to load user data.</td></tr>';
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        if (document.getElementById('lms-users-table-body')) fetchLmsUsers();

        // HRM Dropdown
        const hrmDropdownHeader = document.getElementById('hrmDropdownHeader');
        const hrmDropdownMenu = document.getElementById('hrmDropdownMenu');
        const hrmOptions = document.querySelectorAll('.hrm-option');
        const hrmSearch = document.getElementById('hrmSearch');
        const selectedHrmSpan = document.getElementById('selectedHrm');
        const lmsNameInput = document.getElementById('lms_name');

        hrmDropdownHeader.addEventListener('click', () => {
            hrmDropdownMenu.classList.toggle('show');
        });

        document.addEventListener('click', (e) => {
            if (!hrmDropdownHeader.contains(e.target) && !hrmDropdownMenu.contains(e.target)) {
                hrmDropdownMenu.classList.remove('show');
            }
        });

        hrmSearch.addEventListener('keyup', () => {
            const search = hrmSearch.value.toLowerCase();
            hrmOptions.forEach(option => {
                const name = option.dataset.name;
                option.style.display = name.includes(search) ? 'block' : 'none';
            });
        });

        hrmOptions.forEach(option => {
            option.addEventListener('click', () => {
                selectedHrmSpan.textContent = option.textContent;
                selectedHrmSpan.classList.add('selected-hrm');
                lmsNameInput.value = option.textContent;
                hrmDropdownMenu.classList.remove('show');
            });
        });

        // LMS form submission
        document.getElementById('lms-create-user-form').addEventListener('submit', function(e){
            e.preventDefault();
            const feedback = document.getElementById('lms-feedback');
            const submitBtn = this.querySelector('button[type="submit"]');
            feedback.innerHTML = '<div class="alert alert-info py-2">Creating account...</div>';
            submitBtn.disabled = true;

            const data = {
                name: lmsNameInput.value,
                email: document.getElementById('lms_email').value,
                password: document.getElementById('lms_password').value,
                faculty_id: document.getElementById('lms_faculty').value
            };

            fetch('{{ route("dashboard.lms.register") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(res => {
                if(res.status === true || res.success){
                    feedback.innerHTML = `<div class="alert alert-success py-2">${res.message || 'Account created successfully!'}</div>`;
                    this.reset();
                    fetchLmsUsers();
                    selectedHrmSpan.textContent = "Select HRM...";
                } else {
                    feedback.innerHTML = `<div class="alert alert-danger py-2">${res.message || 'Failed to create account.'}</div>`;
                }
            })
            .catch(err => {
                feedback.innerHTML = '<div class="alert alert-danger py-2">Server error occurred.</div>';
            })
            .finally(() => {
                submitBtn.disabled = false;
            });
        });
    });
</script>

@include('layouts.footer')