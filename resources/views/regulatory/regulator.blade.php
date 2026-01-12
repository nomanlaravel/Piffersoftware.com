@include('layouts.header')

<!--@yield('main')-->

<div class="customer_form" style="margin-bottom:30px !important">
@include('headerlogout')
    <!--<ul class="nav nav-tabs mt-3" id="myTab" role="tablist">-->
    <!--    <li class="nav-item" role="presentation">-->
    <!--        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches" type="button" role="tab" aria-controls="branches" aria-selected="true">Staff Members</button>-->
    <!--    </li>-->
    <!--     <li class="nav-item" role="presentation">-->
    <!--        <button class="nav-link " id="active-tab" data-bs-toggle="tab" data-bs-target="#Activemembers" type="button" role="tab" aria-controls="Activemembers" aria-selected="true">Active Members</button>-->
    <!--    </li>-->
    <!--       <li class="nav-item" role="presentation">-->
    <!--        <button class="nav-link " id="active-tab" data-bs-toggle="tab" data-bs-target="#inActivemembers" type="button" role="tab" aria-controls="InActivemembers" aria-selected="true">In Active Members</button>-->
    <!--    </li>-->
    <!--</ul>-->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Staff Members</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Active Members</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">In Active Members</button>
  </li>
</ul>
  <div class="row mt-3 " >
        <div class="col-lg-6">
            <h4><i><b>Import Regulator:</b></i></h4>

         

            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Import</button>
            </form>
        </div>

        <div class="col-lg-6">
            <h4><i><b>Search Regulator:</b></i></h4>

            <!-- Search Form -->
            <div class="input-group mb-3">
                <input type="text" id="regulator-search" class="form-control" placeholder="Search here...">
            </div>
        </div>
    </div>
  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div style="display:flex; column-gap:10px; align-items:center">
             <button type="button" class="btn btn-link" onclick="history.back()">
                <i class="bi bi-arrow-left"></i>
            </button>
      <h5 class="mt-3" style="font-weight: 700;">Regulator</h5>
        </div>
            @if (auth()->user()->role != 'client')
            <div class="new_branch mt-2" style="width:100%;">
                <a class="btn btn-primary" href="{{ url('postregulator') }}">+ New Regulator</a>
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
                                <th>Department</th>
                                <th>Section</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="regulator-table-body">
                            @foreach ($regulatorData as $regulator)
                            <tr>
                                <td>{{$regulator->reg_id}}</td>
                                <td>{{$regulator->reg_type}}</td>
                                <td>{{$regulator->jurisdiction}}</td>
                                <td>{{$regulator->deptartment}}</td>
                                <td>{{$regulator->section}}</td>
                                <td style="display:flex; gap: 10px; align-items: center;">
                                    <a href="{{ route('viewregulator', ['id' => $regulator->id]) }}" class="btn btn-primary" style="width:84%; height:80%;">View</a>
                                    @if (auth()->user()->role != 'client')
                                    <a href="{{ route('editregulator', ['id' => $regulator->id]) }}" class="btn btn-primary" style="width:40%; height:80%;">Edit</a>
                                    @endif
                                      @if (auth()->user()->role != 'client')
                                    <a href="{{ route('regulator_delete', ['id' => $regulator->id]) }}" class="btn btn-primary" style="width:40%; height:80%;">Delete</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><h5 class="mt-3" style="font-weight: 700;">Regulator</h5>
            @if (auth()->user()->role != 'client')
            <div class="new_branch mt-2" style="width:100%;">
                <a class="btn btn-primary" href="{{ url('postregulator') }}">+ New Regulator</a>
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
                                <th>Department</th>
                                <th>Section</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="regulator-table-body">
                            @foreach ($activeregulatorData as $regulator)
                            <tr>
                                <td>{{$regulator->reg_id}}</td>
                                <td>{{$regulator->reg_type}}</td>
                                <td>{{$regulator->jurisdiction}}</td>
                                <td>{{$regulator->deptartment}}</td>
                                <td>{{$regulator->section}}</td>
                                <td style="display:flex; gap: 10px; align-items: center;">
                                    <a href="{{ route('viewregulator', ['id' => $regulator->id]) }}" class="btn btn-primary" style="width:84%; height:80%;">View</a>
                                    @if (auth()->user()->role != 'client')
                                    <a href="{{ route('editregulator', ['id' => $regulator->id]) }}" class="btn btn-primary" style="width:40%; height:80%;">Edit</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div></div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"><h5 class="mt-3" style="font-weight: 700;">Regulator</h5>
            @if (auth()->user()->role != 'client')
            <div class="new_branch mt-2" style="width:100%;">
                <a class="btn btn-primary" href="{{ url('postregulator') }}">+ New Regulator</a>
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
                                <th>Department</th>
                                <th>Section</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="regulator-table-body">
                            @foreach ($inactiveregulatorData as $regulator)
                            <tr>
                                <td>{{$regulator->reg_id}}</td>
                                <td>{{$regulator->reg_type}}</td>
                                <td>{{$regulator->jurisdiction}}</td>
                                <td>{{$regulator->deptartment}}</td>
                                <td>{{$regulator->section}}</td>
                                <td style="display:flex; gap: 10px; align-items: center;">
                                    <a href="{{ route('viewregulator', ['id' => $regulator->id]) }}" class="btn btn-primary" style="width:84%; height:80%;">View</a>
                                    @if (auth()->user()->role != 'client')
                                    <a href="{{ route('editregulator', ['id' => $regulator->id]) }}" class="btn btn-primary" style="width:40%; height:80%;">Edit</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div></div>
</div>
</div>

@include('layouts.footer')

<!--<script>-->
<!--    $(document).ready(function () {-->
        <!--// Search functionality-->
<!--        $('#regulator-search').on('input', function () {-->
<!--            var searchText = $(this).val().toLowerCase();-->

<!--            $('#regulator-table-body tr').each(function () {-->
                <!--var currentID = $(this).find('td:nth-child(1)').text().toLowerCase(); // Assuming the ID is in the first column-->
                <!--var currentType = $(this).find('td:nth-child(2)').text().toLowerCase(); // Assuming the Type is in the second column-->
<!--                if (currentID.includes(searchText) || currentType.includes(searchText)) {-->
<!--                    $(this).show();-->
<!--                } else {-->
<!--                    $(this).hide();-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->
<script>
    $(document).ready(function () {
        // Search functionality
        $('#regulator-search').on('input', function () {
            var searchText = $(this).val().toLowerCase();

            $('#regulator-table-body tr').each(function () {
                var currentID = $(this).find('td:nth-child(1)').text().toLowerCase(); // Regulatory ID
                var currentType = $(this).find('td:nth-child(2)').text().toLowerCase(); // Type
                var currentJurisdiction = $(this).find('td:nth-child(3)').text().toLowerCase(); // Jurisdiction
                var currentDepartment = $(this).find('td:nth-child(4)').text().toLowerCase(); // Department
                var currentSection = $(this).find('td:nth-child(5)').text().toLowerCase(); // Section

                // Show the row if any column contains the search text
                if (
                    currentID.includes(searchText) ||
                    currentType.includes(searchText) ||
                    currentJurisdiction.includes(searchText) ||
                    currentDepartment.includes(searchText) ||
                    currentSection.includes(searchText)
                ) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    });
</script>

