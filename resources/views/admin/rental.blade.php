@include('layouts.header')

@yield('main')

    <!--End of the Navbar-->



    <!--Customer Form-->
    <link rel="stylesheet" href="css/mBox.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="jquery-3.7.1.min.js"></script>
    <div class="customer_form">


@include('headerlogout')

       {{-- Delete Model --}}
       {{-- <div class="modal fade" id="DeleteModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fs-5" id="staticBackdropLabel">Delete Data</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('deleterental', ['id' => $rental->id]) }}" method="POST">
              @csrf
              @method('DELETE')

              <p>Are You Sure?</p>
              <input type="text" id="deleting_id" name="del_rental_id">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary">Yes</button>
              </div>

            </form>
          </div>
        </div>
      </div> --}}

      <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches" type="button"
            role="tab" aria-controls="branches" aria-selected="true"> Total Footprints </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#active" type="button"
            role="tab" aria-controls="active" aria-selected="false"> Active </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#inactive" type="button"
            role="tab" aria-controls="inactive" aria-selected="false"> Inactive </button>
        </li>
      </ul>

      <div class="tab-content" id="myTabContent">

        <!--<h5 class="mt-3" style="font-weight: 700;">-->
        <!--  Rental Properties-->
        <!--</h5>-->
          <div class="modal-header border-0">
            <div style="display:flex; column-gap:10px; align-items:center">
                <button type="button" class="btn btn-link" onclick="history.back()">
                 <i class="bi bi-arrow-left"></i>
                </button>
                <h5 class="mt-3" style="font-weight: 700;"> Rental Properties: </h5>
            </div>
          </div>
        <!--Toggle tab- Status Form-->
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
            <div class="new_branch mt-2">
                @if (auth()->user()->role !== 'client')
              <a href="{{url('postrental')}}"><button>
                <i class="fa-solid fa-plus"></i> New
              </button></a>
              @endif
            </div>
             <form method="GET" action="{{ route('rental.details.search') }}">
                <div class="row">
                <div class="col-md-6 ">
                    <div class="d-flex align-items-center " style="column-gap: 10px">
                        <div><label for="region">Filter by RP Number:</label>
                    <select class="form-control" name="region" id="region">
                        <option value="all">-- Select All RP --</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region }}">{{ $region }}</option>
                        @endforeach
                    </select></div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-filter"></i></button>
                    </div>
                    </div>
                </div>
              </div>
            </form>
             <form method="GET" action="{{ route('rental.property.record.search') }}">
                <div class="row">
                <div class="col-md-6 ">
                    <div class="d-flex align-items-center " style="column-gap: 10px">
                        <div><label for="region">Filter by RP Number:</label>
                    <select class="form-control" name="region" id="region">
                        <option value="all">-- Select All RP --</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region }}">{{ $region }}</option>
                        @endforeach
                    </select></div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-filter"></i></button>
                    </div>
                    </div>
                </div>
              </div>
            </form>
            <div class="table-responsive mt-2">
              <div style="height: 380px; overflow-y: auto;">
                <table class="table table-bordered table-striped table-fixed">
                  <thead>
                    <tr>
                      <th class="col-lg-3 col-sm-5 col-1">RP Number</th>
                      <th class="col-lg-4 col-sm-5 col-1">Type</th>
                      <th class="col-lg-2 col-sm-5 col-1">Description</th>
                      <th class="col-lg-1 col-sm-1 col-1">Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($rentals as $rental)
                    <tr>

                      <td>{{$rental->rp_no}}</td>
                      <td>{{$rental->type}}</td>
                      <td>{{$rental->desc}}</td>
                      <td style="display:flex; gap: 10px; align-items: center;">
                          <a href="{{ route('viewrental', ['id' => $rental->id]) }}" class="btn btn-primary btn-sm" ><i class="fa-solid fa-eye"></i></a>
                         @if (auth()->user()->role !== 'client')
                          <a href="{{ route('editrental', ['id' => $rental->id]) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                        @endif
                        {{-- <form action="{{ route('deleterental', ['id' => $rental->id]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn deletebtn" style="border-radius:20%;"><i class="material-icons" style="color: rgb(216, 0, 0);">delete</i></button>
                        </form> --}}

                          <a href="{{ route('deleterental', ['id' => $rental->id]) }}" class="btn btn-danger btn-sm" >
                              <i class="fa-solid fa-trash"></i>
                          </a>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
            </div>

            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <p>Are you sure you want to Delete?</p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <form id="deleteForm" action="" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>

        </div>
      </div>
    </div>


@include('layouts.footer')

<script>
  $(document).ready(function () {
        $('.deletebtn').on('click', function () {
            var deleteUrl = $(this).data('delete-url');
            $('#deleteForm').attr('action', deleteUrl);
        });
    });
</script>
