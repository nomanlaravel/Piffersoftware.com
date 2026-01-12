@include('layouts.header')

@yield('main')

<div class="customer_form">
@include('headerlogout')
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#branches"
                type="button" role="tab" aria-controls="branches" aria-selected="true"> Total Payrols
            </button>
        </li>
    </ul>


    <div class="tab-content" id="myTabContent">
        <!--Toggle tab- Status Form-->
        <!--Main-->
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
            <!--<h5 class="mt-3" style="font-weight: 700;">-->
                
            <!--</h5>-->
             <div class="modal-header border-0">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                     <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="mt-3" style="font-weight: 700;"> Payroll: </h5>
                </div>
              </div>
     <form action="{{ url('/search') }}" method="GET">
   <div class="row">
       <div class="col-md-3">
            <label>Month:</label>
            <select name="month" class="form-control">
                 <option value="">Select Month</option>
                @for($m=1; $m<=12; $m++)
                    <option value="{{ $m }}">{{ date("F", mktime(0, 0, 0, $m, 1)) }}</option>
                @endfor
            </select>
       </div>
         <div class="col-md-3">
                <label>Year:</label>
            <select name="year" class="form-control">
                <option value="">Select date</option>
                @for($y=date('Y'); $y>=2020; $y--)
                    <option value="{{ $y }}">{{ $y }}</option>
                @endfor
            </select>
         </div>
       <div class="col-md-3">
           <style>
    /* Styling for the searchable dropdown */
    .custom-dropdown {
        position: relative;
        width: 100%;
    }
    
    .search-box {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    .options-list {
        position: absolute;
        width: 100%;
        max-height: 200px;
        overflow-y: auto;
        background: white;
        border: 1px solid #ccc;
        border-top: none;
        display: none;
        z-index: 10;
    }
    
    .option-item {
        padding: 8px;
        cursor: pointer;
    }
    
    .option-item:hover {
        background-color: #f0f0f0;
    }
</style>

<div class="custom-dropdown">
    <!-- Search Input -->
       <label>HRM Name:</label>
    <input type="text" id="searchInput" class="search-box" placeholder="Search HRM Name..." onkeyup="filterOptions()">

    <!-- Dropdown List -->
    <div id="optionsList" class="options-list">
        
        @foreach($hrm as $hm)
            <div class="option-item" onclick="selectOption('{{ $hm->name }}')">
                {{ $hm->name }}
            </div>
        @endforeach
    </div>

    <!-- Hidden Select for Form Submission -->
    <select name="name" id="hrmSelect" class="form-control" style="display: none;">
        <option value="">Select HRM Name</option>
        @foreach($hrm as $hm)
            <option value="{{ $hm->name }}">{{ $hm->name }}</option>
        @endforeach
    </select>
</div>

        </div>
          <div class="col-md-3 mt-4">
         <button class="btn btn-light" type="submit">Search</button>
          </div>
   </div>

 

</form>
    <div class="table-responsive mt-2">
        <table class="table table-bordered table-striped table-fixed">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Salary Details</th>
                    <th>Attendance Records</th>
                    <th>Leave Records</th>
                    <th>Total Overtime Hours</th>
                    <th>Net Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="payroll-table-body">
                @foreach ($payrolls as $index => $payroll)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $payroll->hrm->name??"N/A" }}</td>
                        <td>{{ $payroll->hrm->designation??"N/A" }}</td>
                        <td style="text-transform:uppercase">{{ $payroll->p_department??"N/A" }}</td>
                        <td style="text-transform:uppercase">{{ $payroll->p_salary_details??"N/A" }}</td>
                        <td style="text-transform:uppercase">{{ $payroll->p_attendance_records??"N/A" }}</td>
                        <td style="text-transform:uppercase">{{ $payroll->p_leave_records??"N/A" }}</td>
                        <td style="text-transform:uppercase">{{ $payroll->p_total_overtime_hours??"N/A" }}</td>
                        <td style="text-transform:uppercase">{{ $payroll->p_net_salary??"N/A" }}</td>
                        <td style="display:flex; gap: 10px; align-items: center;">
                            <a href="{{route('print.payroll',$payroll->id)}}" class="btn">
                                <img src="https://cdn-icons-png.flaticon.com/128/16753/16753071.png" width="30px" height="30px">
                            </a>
                   <button type="button" class="btn" data-toggle="modal" data-target="#payrollModal-{{ $payroll->id }}">
                        <img src="https://cdn-icons-png.flaticon.com/128/7794/7794603.png" width="30px" height="30px">
                    </button>
                            </a>
                                                              @if (
                                  auth()->user()->hasAnyRole('Super Admin')
                                    )
                                    @if (auth()->user()->role !== 'client')                                    
                                    <form action="{{ route('delete.payroll', ['id' => $payroll->id]) }}" >
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="material-icons">delete</i>
                                        </button>
                                    </form>
                                    @endif
                                    @endif
                        </td>
                    </tr>
             <div class="modal fade" id="payrollModal-{{ $payroll->id }}" tabindex="-1" role="dialog" aria-labelledby="payrollModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Items</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            
                      
                            <div class="modal-body">
                        <form action="{{ route('save.items') }}" method="POST">
                            @csrf
                            <input type="hidden" name="payroll_id" value="{{$payroll->id}}"> 
                        
                            <div id="items-container">
                                <div class="row item mb-2">
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="name" required placeholder="Item Name">
                                    </div>
                                    <div class="col-md-2">
                                    <strong>Yes</strong>
                                     <input type="radio" name="item_dis" value='1' >
                                      <strong>No</strong>
                                      <input type="radio" name="item_dis" value='0' >

                                    </div>
                                </div>
                            </div>
                            <button type="submit">Submit</button>
                        </form>
                            </div>
            
                           
                    
                    </div>
                </div>
            </div>
          
        @endforeach
            </tbody>
        </table>
    </div>

   
     <style>
                .pagination {
                    display: flex;
                    justify-content: center;
                    gap: 8px;
                    margin-left:20px;
                }
            
                .pagination .page-item .page-link {
                    border-radius: 5px;
                    padding: 8px 12px;
                    color: #007bff;
                    border: 1px solid #ddd;
                    transition: 0.3s;
                }
            
                .pagination .page-item.active .page-link {
                    background-color: #007bff;
                    color: white;
                    border-color: #007bff;
                }
            
                .pagination .page-item .page-link:hover {
                    background-color: #f8f9fa;
                }
            </style>

          <div class="d-flex justify-content-between mt-4">
                    {{$payrolls->links('pagination::bootstrap-5') }}
                </div>

        </div>
    </div>
</div>

<script>
    let searchInput = document.getElementById("searchInput");
    let optionsList = document.getElementById("optionsList");
    let hrmSelect = document.getElementById("hrmSelect");

    // Show dropdown when clicking the search box
    searchInput.addEventListener("focus", function() {
        optionsList.style.display = "block";
    });

    // Hide dropdown when clicking outside
    document.addEventListener("click", function(event) {
        if (!searchInput.contains(event.target) && !optionsList.contains(event.target)) {
            optionsList.style.display = "none";
        }
    });

    // Filter options based on input
    function filterOptions() {
        let filter = searchInput.value.toLowerCase();
        let options = optionsList.getElementsByClassName("option-item");

        for (let i = 0; i < options.length; i++) {
            let text = options[i].textContent.toLowerCase();
            options[i].style.display = text.includes(filter) ? "block" : "none";
        }
    }

    // Select an option
    function selectOption(value) {
        searchInput.value = value;
        optionsList.style.display = "none";

        // Set the selected option in the hidden select
        for (let i = 0; i < hrmSelect.options.length; i++) {
            if (hrmSelect.options[i].value === value) {
                hrmSelect.options[i].selected = true;
                break;
            }
        }
    }
</script>





@include('layouts.footer')
