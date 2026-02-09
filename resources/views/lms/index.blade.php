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
        transition: margin-right .5s; /* Transition for the right sidebar toggle */
    }

    /* Desktop: Push content right to clear the fixed LEFT navbar (approx 15-20% width) */
    @media (min-width: 992px) {
        #main {
            margin-left: 17%;
            width: 82%; 
        }
    }

    /* Mobile/Tablet: Default layout */
    @media (max-width: 991px) {
        #main {
            margin-left: 0;
            width: 100%;
        }
    }
</style>

<div id="main">
    <!-- Sidebar Toggle (For Right Sidebar) -->
    <div style="text-align: right; margin-bottom: 20px;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>

    <div class="container">
        <div class="text-center mb-5">
            <h2 class="font-weight-bold" style="color: #444;">LMS Management Dashboard</h2>
            <p class="text-muted">Manage your Learning Management System access and users</p>
        </div>

        {{-- Admin Section: Only visible to Admins/Super Admins --}}
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
                                <div class="form-group mb-3">
                                    <label for="lms_email" class="form-label font-weight-bold ml-1">Email
                                        Implementation</label>
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
                                                        {{-- Future: Add Edit/Delete buttons here --}}
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

        {{-- Direct Link Section: Visible to everyone who visits this page --}}
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
    fetch('https://piffersoftware.com/lms/api/faculties', { 
            method: 'GET',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ email, password })
        })


    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        // When opening right sidebar, push content to left (margin-right) or just let it overlay
        // Given the layout, just opening the drawer is often enough, but let's shift main if desired
        document.getElementById("main").style.marginRight = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
    }

    // --- API Interactions (Prepared for implementation) ---

    // 1. Create User
    document.getElementById('lms-create-user-form')?.addEventListener('submit', function (e) {
        e.preventDefault();

        const email = document.getElementById('lms_email').value;
        const password = document.getElementById('lms_password').value;
        const feedback = document.getElementById('lms-feedback');

        feedback.innerHTML = '<div class="alert alert-info py-2">Creating account...</div>';

        // TODO: Replace with actual Fetch API call
        fetch('https://piffersoftware.com/lms/api/register', { 
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ email, password })
        })

        // Simulation:
        setTimeout(() => {
            console.log("Mock Create User:", { email, password });
            feedback.innerHTML = '<div class="alert alert-success py-2">Account created successfully (Simulation). API integration pending.</div>';

            // Add to table safely
            const tbody = document.getElementById('lms-users-table-body');
            if (tbody) {
                // Remove loading if present
                if (tbody.querySelector('td[colspan]')) tbody.innerHTML = '';

                const row = `<tr>
                    <td>#</td>
                    <td>${email}</td>
                    <td>${new Date().toISOString().split('T')[0]}</td>
                    <td><button class="btn btn-sm btn-info text-white">View</button></td>
                 </tr>`;
                tbody.insertAdjacentHTML('afterbegin', row);
            }

            this.reset();
        }, 1500);
    });

    // 2. Fetch Users
    function fetchLmsUsers() {
        const tbody = document.getElementById('lms-users-table-body');
        if (!tbody) return;

        tbody.innerHTML = '<tr><td colspan="4" class="text-center py-4 text-muted"><div class="spinner-border spinner-border-sm text-success" role="status"></div> Refreshing data...</td></tr>';

        // TODO: Replace with actual Fetch API call
        // fetch('/api/lms/users').then...

        // Simulation:
        setTimeout(() => {
            // Mock Data
            const users = [
                { id: 101, email: 'admin@piffersoftware.com', created_at: '2023-11-01' },
                { id: 102, email: 'user.demo@example.com', created_at: '2023-12-15' },
                { id: 103, email: 'faculty@piffer.edu', created_at: '2024-01-20' },
            ];

            let rows = '';
            if (users.length > 0) {
                users.forEach(user => {
                    rows += `<tr>
                        <td>${user.id}</td>
                        <td>${user.email}</td>
                        <td>${user.created_at}</td>
                        <td>
                            <button class="btn btn-sm btn-info text-white me-1">Details</button>
                        </td>
                    </tr>`;
                });
            } else {
                rows = '<tr><td colspan="4" class="text-center text-muted">No users found.</td></tr>';
            }
            tbody.innerHTML = rows;
        }, 1000);
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function () {
        if (document.getElementById('lms-users-table-body')) {
            fetchLmsUsers();
        }
    });
</script>

@include('layouts.footer')