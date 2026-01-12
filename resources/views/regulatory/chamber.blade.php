@include('layouts.header')

@yield('main')
<div class="customer_form">



@include('headerlogout')
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches"
                type="button" role="tab" aria-controls="branches" aria-selected="true"> Total Assets
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#active"
                type="button" role="tab" aria-controls="active" aria-selected="false"> Refresher
                    </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#inactive"
                type="button" role="tab" aria-controls="inactive" aria-selected="false"> Live Fire Arm
                    </button>
        </li>
    </ul>
    <div class="row mt-3">
        <div class="col-lg-6">
            <h4><i><b>Import Chamber:</b></i></h4>

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
            </form>
        </div>

        <div class="col-lg-6">
            <h4><i><b>Search Chamber:</b></i></h4>

            <!-- Search Form -->
            <div class="input-group mb-3">
                <input type="text" id="chamber-search" class="form-control" placeholder="Search here...">
            </div>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <!--Toggle tab- Status Form-->
        <!--Main-->
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
              <div class="modal-header border-0">
                              <div style="display:flex; column-gap:10px; align-items:center">
                                 <button type="button" class="btn btn-link" onclick="history.back()">
                                    <i class="bi bi-arrow-left"></i>
                                </button>
                               <h5 class="mt-3" style="font-weight: 700;">Chamber </h5>
                            </div>
                       </div>
            <!--<h5 class="mt-3" style="font-weight: 700;">Chamber</h5>-->
            @if (auth()->user()->role != 'client')
            <div class="new_branch mt-2">
                <a href="{{ url('postchamber') }}"><button>+ New Chamber</button></a>
            </div>
            @endif

            <div class="table-responsive mt-2">
                <div style="height: 380px; overflow-y: auto;">
                    <table class="table table-bordered table-striped table-fixed">
                        <thead>
                            <tr>
                                <th>Regulatory ID</th>
                                <th>Type</th>
                                <th>Jurisdiction</th>
                                <th>MemberShip Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="chamber-table-body">
                            @foreach($chamberData as $chamber)
                            <tr>
                                <th>{{$chamber->chamber_regulatory_id}}</th>
                                <td>{{$chamber->chamber_type}}</td>
                                <td>{{$chamber->chamber_jurisdication}}</td>
                                <td>{{$chamber->chamber_membership_no}}</td>
                                <td style="display:flex; gap: 10px; align-items: center;">
                                    <a href="{{ route('viewchamber', ['id' => $chamber->id]) }}" class="btn btn-primary" style="width:84%; height:80%;">View</a>
                                    @if (auth()->user()->role != 'client')
                                    <a href="{{ route('editchamber', ['id' => $chamber->id]) }}" class="btn btn-primary" style="width:40%; height:80%;">Edit</a>
                                    @endif
                                     <form action="{{ route('deletechamber', ['id' => $chamber->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="border-radius:30%;">Delete</button>
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
@include('layouts.footer')

<script>
    $(document).ready(function () {
        // Search functionality
        $('#chamber-search').on('input', function () {
            var searchText = $(this).val().toLowerCase();

            $('#chamber-table-body tr').each(function () {
                var currentID = $(this).find('td:nth-child(1)').text().toLowerCase(); // Assuming the ID is in the first column
                var currentType = $(this).find('td:nth-child(2)').text().toLowerCase(); // Assuming the Type is in the second column
                if (currentID.includes(searchText) || currentType.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>
