@include('layouts.header')

@yield('main')

<!-- Customer Form -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="jquery-3.7.1.min.js"></script>

<div class="customer_form">
    @include('headerlogout')

    {{-- ================= CUSTOMER VIEW ================= --}}
    @if(Auth::user()->role === 'customer')

        <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active"
                        id="security-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#security"
                        type="button"
                        role="tab"
                        aria-controls="security"
                        aria-selected="true">
                    Security Staff
                </button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active"
                 id="security"
                 role="tabpanel"
                 aria-labelledby="security-tab">

                <div class="modal-header border-0">
                    <div style="display:flex; column-gap:10px; align-items:center">
                        <button type="button" class="btn btn-link" onclick="history.back()">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <h5 class="mt-3" style="font-weight: 700;">
                            Security Staff :
                        </h5>
                    </div>
                </div>

                {{-- Single unified table for customer --}}
                @include('partials.hrm_table', ['data' => $hrmData])

            </div>
        </div>

    {{-- ================= ADMIN / SUPERADMIN VIEW ================= --}}
    @else

        <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="staff-tab" data-bs-toggle="tab"
                        data-bs-target="#staff" type="button" role="tab">
                    All Staff Members
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="guards-tab" data-bs-toggle="tab"
                        data-bs-target="#guards" type="button" role="tab">
                    Guards
                </button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="piffers-tab" data-bs-toggle="tab"
                        data-bs-target="#piffers" type="button" role="tab">
                    Piffers Staff Members
                </button>
            </li>
        </ul>

        <div class="row mt-3">
            @if (Auth::user()->role != 'customer')
                <div class="col-lg-6">
                    <h4><i><b>Import Employees:</b></i></h4>
                    <form action="{{ route('hrm.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </form>
                </div>

                <div class="col-lg-6">
                    <h4><i><b>Search Employee:</b></i></h4>
                    <div class="input-group mb-3">
                        <input type="text" id="hrm-search" class="form-control" placeholder="Search here...">
                    </div>
                    <div id="search-results"></div>
                </div>
            @endif
        </div>

        <div class="mb-4" style="width:100%;">
            @if (Auth::user()->role != 'customer' && Auth::user()->role != 'client')
                <a class="btn btn-primary float-end mb-4" href="{{ url('posthrm') }}">
                    + New Staff
                </a>
            @endif
        </div>

        <div class="tab-content" id="myTabContent">

            {{-- ALL STAFF --}}
            <div class="tab-pane fade show active" id="staff" role="tabpanel">
                <div class="modal-header border-0">
                    <div style="display:flex; column-gap:10px; align-items:center">
                        <button type="button" class="btn btn-link" onclick="history.back()">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <h5 class="mt-3" style="font-weight: 700;">
                            Human Resource Management:
                        </h5>
                    </div>
                </div>

                <form method="GET" action="{{ route('staff.details.search') }}">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="region">Filter by Region:</label>
                            <select class="form-control" name="region" id="region">
                                <option value="">-- Select Region --</option>
                                @foreach ($regions as $region)
                                    <option value="{{ $region }}">{{ $region }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary mt-4">Search</button>
                        </div>
                    </div>
                </form>

                @include('partials.hrm_table', ['data' => $hrmData])
            </div>

            {{-- GUARDS --}}
            <div class="tab-pane fade" id="guards" role="tabpanel">
                @include('partials.hrm_table', ['data' => $hrmData->where("category","Guard")])
            </div>

            {{-- PIFFERS --}}
            <div class="tab-pane fade" id="piffers" role="tabpanel">
                @include('partials.hrm_table', ['data' => $hrmData->where("category","Piffers Employe")])
            </div>

        </div>
    @endif

    {{-- ================= DELETE MODAL (COMMON) ================= --}}
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Are you sure you want to Delete?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>

                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

@include('layouts.footer')

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
    $('#hrm-search').on('input', function () {
        var searchText = $(this).val().toLowerCase();

        $.ajax({
            url: "{{ route('search.hrms') }}",
            type: 'GET',
            data: { search: searchText },
            success: function (data) {
                $('#employee-table-body').html(data.html);
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });
    });
</script>