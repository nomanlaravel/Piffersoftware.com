@include('layouts.header')

@yield('main')
<link rel="stylesheet" href="css/mBox.css">

<div class="customer_form">
    <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>

    <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="#" style="color: gold;"> <i class="bi bi-gear mr-2"></i> PIFFERS Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i>Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>

    <div class="tab-content" id="myTabContent">

        <div class="d-flex align-items-center mt-4">
          <button type="button" class="btn btn-link" onclick="history.back()"><i class="bi bi-arrow-left"></i></button>
          <h5 class="mt-3" style="font-weight: 700;">
            Internal Dispatch Details :
            </h5>
        </div>
        <!--Toggle tab- Status Form-->
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
            @if (auth()->user()->role !== 'client')
                <div class="new_branch mt-2">
                    <a href="{{ route('dispatch') }}"><button>
                        + Add Lot
                    </button></a>
                </div>
            @endif
            <div class="table-responsive mt-2">
                <div style="height: 380px; overflow-y: auto;">
                    <table class="table table-bordered table-striped table-fixed">
                        <thead>
                            <tr>
                                <th class="col-lg-1 col-sm-1 col-1">#</th>
                                <th class="col-lg-1 col-sm-1 col-1">Date</th>
                                <th class="col-lg-1 col-sm-1 col-1">Store Name</th>
                                <th class="col-lg-1 col-sm-5 col-1">Category</th>
                                <th class="col-lg-1 col-sm-5 col-1">Article Name</th>
                                <th class="col-lg-1 col-sm-1 col-1">Cro Name</th>
                                <th class="col-lg-1 col-sm-1 col-1">Quantity</th>
                                <th class="col-lg-1 col-sm-1 col-1">Total Price</th>
                                <th class="col-lg-1 col-sm-1 col-1">Action</th>
                            </tr>
                        </thead>

                        <tbody id="branch-table-body">
                            @foreach($dispatches as $index=>$dispatch)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{$dispatch->date}}</td>
                                <td>{{$dispatch->category}}</td>
                                <td>{{$dispatch->sub_category}}</td>
                                <td>{{$dispatch->article_name}}</td>
                                <td>
                                 {{ $dispatch->cro->cro_name??"" }}
                                </td>
                                <td>{{$dispatch->quantity}}</td>
                                <td>{{$dispatch->total_price}}</td>
                                <td style="display:flex; gap: 10px; align-items: center;">
                                  <a href="{{ route('delete.internal.dispatch',$dispatch->id) }}"  class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash"></i></a>
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
        $('#branch-search').on('input', function () {
            var searchText = $(this).val().toLowerCase();

            $('#branch-table-body tr').each(function () {
                var currentName = $(this).find('td:nth-child(2)').text().toLowerCase(); // Assuming the branch name is in the second column
                if (currentName.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        // Handle delete button click
        $('.deletebtn').on('click', function () {
            var deleteUrl = $(this).data('delete-url');
            $('#deleteForm').attr('action', deleteUrl);
        });
    });
</script>
