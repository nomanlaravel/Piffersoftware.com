@include('layouts.header')

@yield('main')

    <!--End of the Navbar-->

    <!--Customer Form-->
<link rel="stylesheet" href="css/mBox.css">
    <div class="customer_form">

      <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
      </div>

      <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="#" style="color: gold;"> <i class="bi bi-gear mr-2"></i> PIFFERS Administration Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
      </div>

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

        <h5 class="mt-3" style="font-weight: 700;">
          Branches and Head Office
        </h5>
        <!--Toggle tab- Status Form-->
        <div class="tab-pane fade show active" id="branches" role="tabpanel" aria-labelledby="home-tab">
          <div class="new_branch mt-2">
            <button data-toggle="modal" data-target="#add_user">
              + New Branch
            </button>
          </div>

          <table class="table table-bordered mt-5" id="user-table">
            <tr>
              <th class="col-lg-1 col-sm-1 col-1">Sr No</th>
              <th class="col-lg-3 col-sm-5 col-1">Name</th>
              <th class="col-lg-1 col-sm-5 col-1">Code</th>
              <th class="col-lg- col-sm-5 col-1">Branch Address</th>
              <th class="col-lg-1 col-sm-1 col-1">Action</th>
            </tr>

            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Armoghan Tallat Khan</td>
                <td>13</td>
                <td>unknown address</td>
                <td>
                  <div class="btn-group dropup">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <!-- <i class="bi bi-caret-down-square"></i> -->
                      <i class="bi bi-gear-wide"></i>
                    </button>
                    <div class="dropdown-menu">
                      <i class="bi bi-trash" type="button" href="#"></i> <br>
                      <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                      <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Muhammad Salman</td>
                <td>79</td>
                <td>anonymous address</td>
                <td>
                  <div class="btn-group dropup">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <!-- <i class="bi bi-caret-down-square"></i> -->
                      <i class="bi bi-gear-wide"></i>
                    </button>
                    <div class="dropdown-menu">
                      <i class="bi bi-trash" type="button" href="#"></i> <br>
                      <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                      <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Atta ur rehman</td>
                <td>97</td>
                <td>Finding address</td>
                <td>
                  <div class="btn-group dropup">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <!-- <i class="bi bi-caret-down-square"></i> -->
                      <i class="bi bi-gear-wide"></i>
                    </button>
                    <div class="dropdown-menu">
                      <i class="bi bi-trash" type="button" href="#"></i> <br>
                      <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                      <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

        </div>

        <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="profile-tab">
          <table class="table table-bordered mt-5" id="user-table">
            <tr>
              <th class="col-lg-1 col-sm-1 col-1">Sr No</th>
              <th class="col-lg-3 col-sm-5 col-1">Name</th>
              <th class="col-lg-1 col-sm-5 col-1">Code</th>
              <th class="col-lg- col-sm-5 col-1">Branch Address</th>
              <th class="col-lg-1 col-sm-1 col-1">Action</th>
            </tr>

            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Armoghan Tallat Khan</td>
                <td>13</td>
                <td>unknown address</td>
                <td>
                  <div class="btn-group dropup">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <!-- <i class="bi bi-caret-down-square"></i> -->
                      <i class="bi bi-gear-wide"></i>
                    </button>
                    <div class="dropdown-menu">
                      <i class="bi bi-trash" type="button" href="#"></i> <br>
                      <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                      <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Muhammad Salman</td>
                <td>79</td>
                <td>anonymous address</td>
                <td>
                  <div class="btn-group dropup">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <!-- <i class="bi bi-caret-down-square"></i> -->
                      <i class="bi bi-gear-wide"></i>
                    </button>
                    <div class="dropdown-menu">
                      <i class="bi bi-trash" type="button" href="#"></i> <br>
                      <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                      <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="tab-pane fade" id="inactive" role="tabpanel" aria-labelledby="contact-tab">
          <table class="table table-bordered mt-5" id="user-table">
            <tr>
              <th class="col-lg-1 col-sm-1 col-1">Sr No</th>
              <th class="col-lg-3 col-sm-5 col-1">Name</th>
              <th class="col-lg-1 col-sm-5 col-1">Code</th>
              <th class="col-lg- col-sm-5 col-1">Branch Address</th>
              <th class="col-lg-1 col-sm-1 col-1">Action</th>
            </tr>

            <tbody>
              <tr>
                <th scope="row">3</th>
                <td>Atta ur rehman</td>
                <td>97</td>
                <td>Finding address</td>
                <td>
                  <div class="btn-group dropup">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false">
                      <!-- <i class="bi bi-caret-down-square"></i> -->
                      <i class="bi bi-gear-wide"></i>
                    </button>
                    <div class="dropdown-menu">+ new store
                      <i class="bi bi-trash" type="button" href="#"></i> <br>
                      <i class="bi bi-pencil-square" type="button" href="#"></i> <br>
                      <i class="bi bi-arrow-up-circle" type="button" href="#"></i> <br>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!--Popup Modal for Admin new entry -->
      <!-- Modal -->
      <div class="modal fade" id="add_branch">
        <div class="modal-dialog" role="document" style="max-width: 75%;">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Administration </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class=" customer_popup_form" style="margin-left: 15%;">
                <div class="row">
                  <div class="col-lg-">
                    <div class="row">
                      <div class="col-lg-12 mb-1 fw-bold">
                        Branch Name <br> <input type="text" placeholder="Name of the branch.." style="width: 100%;">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 mb-1 spacing-right">
                        Branch Type <br> <input type="text" placeholder="Search.." style="width: 100%;">
                      </div>
                      <div class="col-lg-6 mb-1 spacing-left">
                        Branch ID <br> <input type="text" placeholder="Search.." style="width: 100%;">
                      </div>
                    </div>
                    <div class="row" >
                      <div class="col-lg-12 mb-1" >
                        Branch Reporting to <br> <input type="text" placeholder="Search.." style="width: 100%;">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 mb-1">
                        Branch Address <br> <input type="text" placeholder="Search.." style="width:100%">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row mx-1 mb-1">
                      Management Details
                    </div>
                    <div class="row">
                      <div class="col-lg-6 mb-1">
                        GM Name <br> <input type="text" placeholder="Search.." style="width: 100%;">
                      </div>
                      <div class="col-lg-6 mb-1">
                        GM Cell No <br> <input type="text" placeholder="Search.." style="width: 100%;">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 mb-1">
                        GM Email <br> <input type="text" placeholder="Search.." style="width: 100%;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!--Admin Modal end here-->


      <!--Popup model for User new entry-->
      <div class="modal fade" id="add_user">
        <div class="modal-dialog" role="document" style="max-width: 84%; position:relative; left:3%;">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel" style="font-weight: bold;"> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <!--Administration Form-->
              <section>
                <!--Administration-->
                <form action="" class="liscence_form1 m-5" style="width: 95%; border: groove; ">
                  <div class="row d-flex justify-content-center m-auto" style="font-weight:600;">
                    <h5> PIFFERS Administration </h5>
                    <div class="col-lg-6 mt-5 mb-0">
                      <h5>Staff Details:</h5>
                      <div class="row">
                        <div class="col-12">
                          <label for="branch_office_name" class="control-label mb-1 w-100">Office Name</label>
                          <input id="branch_office_name" value="" name="branch_office_name" type="text"
                            class="input-field" aria-="true" aria-invalid="false" style="width: 80%;">
                          <div class="mt-0">
                          </div>
                        </div>
                        <div class="col-6">
                          <label for="branch_type" class="control-label mb-1">Type</label>
                          <select class="browser-default input-field " name="branch_type" id="branch_type"
                            style="width: 92%;">
                            <option value="">Select</option>
                            <option value="1">Regional Head Quarter</option>
                            <option value="2">Head Office</option>
                            <option value="3">Branch</option>
                            <option value="4">Other</option>
                          </select>
                          <div class="mt-0">
                          </div>
                        </div>
                        <div class="col-6">
                          <label for="branch_office_code" class="control-label mb-1">Branch ID</label>
                          <input id="branch_office_code" value="" name="branch_office_code" type="text"
                            class="input-field" aria-="true" aria-invalid="false" style="width: 83%;">
                          <div class="mt-0">
                          </div>
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right form-group" style="margin-left:11px;">
                            Branch Reporting to <br>
                            <select id="category" class="input_field mt-1" name="category" style="width: 100%;">
                            <option value="">Select</option>
                            <option value="Head Office(001)">Head Office(001)</option>
                            <option value="RHQ North 1(051)">RHQ North 1(051)</option>
                            <option value="RHQ North 2(091)">RHQ North 2(091)</option>
                            <option value="RHQ Central 1(042)">RHQ Central 1(042)</option>
                            <option value="RHQ Central 2(0423)">RHQ Central 2(0423)</option>
                            <option value="RHQ South(021)">RHQ South(021)</option>
                            </select>
                            Add Custom Category <br>
                            <div class="input-group">
                              <input type="text" class="form-control" id="custom-category" placeholder="Enter custom category">
                              <button class="btn btn-primary" id="submit-category" type="button" style="margin-top: 4px;">Add</button>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-12 spacing-left">
                        <h5>Address</h5>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Office No <br> <input class="input_field" id="head_office_cell_no" name="office_no" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Building <br> <input class="input_field" id="head_office_cell_no" name="office_building" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Block <br> <input class="input_field" id="head_office_cell_no" name="office_block" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Area <br> <input class="input_field" id="head_office_cell_no" name="office_area" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                City <br> <input class="input_field" id="head_office_cell_no" name="office_city" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Photograph of Building <br> <input class="input_field" id="head_office_cell_no" name="office_photo" type="file" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Pin Location <br> <input class="input_field" id="head_office_cell_no" name="office_pin" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                GPS <br> <input class="input_field" id="head_office_cell_no" name="office_map" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="col-lg-6 mt-5 mb-0">
                      <h5>Management Details </h5>
                      <div class="row">
                        <div class="col-6">
                          <label for="gm_name" class="control-label mb-1">GM Name</label>
                          <input id="gm_name" name="gm_name" value="" type="text" class="input-field" aria-="true"
                            aria-invalid="false" style="width: 90%;">
                          <div class="mt-0">
                          </div>
                        </div>
                        <div class="col-6">
                          <label for="gm_cell_no" class="control-label mb-1">GM Cell No</label>
                          <input id="gm_cell_no" value="" name="gm_cell_no" type="text" class="input-field" aria-="true"
                            aria-invalid="false" style="width: 90%;">
                          <div class="mt-0">
                          </div>
                        </div>
                        <div class="col-6">
                          <label for="gm_email" class="control-label mb-1">GM Email</label>
                          <input id="gm_email" name="gm_email" value="" type="email" class="input-field" aria-="true"
                            aria-invalid="false" style="width: 95.5%;">
                          <div class="mt-0">
                          </div>
                        </div>
                        <div class="col-6">
                            <label for="gm_name" class="control-label mb-1">Category</label>
                            <select id="catagory" class="input_field" name="reg_no" style="width: 97%;">
                              <option value="">Civil</option>
                              <option value="">X-serviceman</option>
                            </select>
                            <div class="mt-0">
                            </div>
                        </div>

                        <div class="col-6">
                          <label for="gm_cell_no" class="control-label mb-1">DGM Name</label>
                          <input id="gm_cell_no" value="" name="gm_cell_no" type="text" class="input-field" aria-="true"
                            aria-invalid="false" style="width: 90%;">
                          <div class="mt-0">
                          </div>
                        </div>
                        <div class="col-6">
                          <label for="gm_email" class="control-label mb-1">DGM Cell No</label>
                          <input id="gm_email" name="gm_email" value="" type="email" class="input-field" aria-="true"
                            aria-invalid="false" style="width: 95.5%;">
                          <div class="mt-0">
                          </div>
                        </div>
                        <div class="col-6">
                          <label for="gm_cell_no" class="control-label  mt-4">CRO Name</label>
                          <input id="gm_cell_no" value="" name="gm_cell_no" type="text" class="input-field" aria-="true"
                            aria-invalid="false" style="width: 90%;">
                          <div class="mt-0">
                          </div>
                        </div>
                        <div class="col-6">
                          <label for="gm_email" class="control-label  mt-4">CRO Cell No</label>
                          <input id="gm_email" name="gm_email" value="" type="email" class="input-field" aria-="true"
                            aria-invalid="false" style="width: 95.5%;">
                          <div class="mt-0">
                          </div>
                        </div>
                        <div class="col-6">
                          <label for="gm_cell_no" class="control-label mb-1">PTCL No</label>
                          <input id="gm_cell_no" value="" name="gm_cell_no" type="text" class="input-field" aria-="true"
                            aria-invalid="false" style="width: 90%;">
                          <div class="mt-0">
                          </div>
                        </div>
                      </div>
                    </div>

                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-rp_details-tab" data-toggle="tab" href="#nav-rp_details"
                          role="tab" aria-controls="nav-rp_details" aria-selected="false">Rental Property Details</a>
                          <a class="nav-item nav-link" id="nav-rp_details-tab" data-toggle="tab" href="#nav-py_details"
                          role="tab" aria-controls="nav-rp_details" aria-selected="false">Rental Payment Details</a>
                        <a class="nav-item nav-link" id="nav-staff_details-tab" data-toggle="tab"
                          href="#nav-staff_details" role="tab" aria-controls="nav-staff_details" aria-selected="false">
                          Staff Details
                        </a>
                        <a class="nav-item nav-link" id="nav-strong-room-tab" data-toggle="tab" href="#nav-strong-room"
                          role="tab" aria-controls="nav-strong-room" aria-selected="false">Weapon Details</a>
                        <a class="nav-item nav-link" id="nav-store-tab" data-toggle="tab" href="#nav-store" role="tab"
                          aria-controls="nav-store" aria-selected="false">Uniform Details</a>
                        <a class="nav-item nav-link" id="nav-branch_report-tab" data-toggle="tab"
                          href="#nav-branch_report" role="tab" aria-controls="nav-branch_report"
                          aria-selected="false">Daily Branch Report</a>
                        <a class="nav-item nav-link" id="nav-store-tab" data-toggle="tab" href="#nav-office" role="tab"
                          aria-controls="nav-store" aria-selected="false">Office Inventory</a>
                        <a class="nav-item nav-link" id="nav-moveable_assets-tab" data-toggle="tab"
                          href="#nav-moveable_assets" role="tab" aria-controls="nav-moveable_assets"
                          aria-selected="false">Moveable Assets</a>
                          <a class="nav-item nav-link" id="nav-moveable_assets-tab" data-toggle="tab"
                          href="#notification" role="tab" aria-controls="nav-moveable_assets"
                          aria-selected="false">Notifications</a>
                        <a class="nav-item nav-link" id="nav-list_of_site_ids-tab" data-toggle="tab"
                          href="#nav-list_of_site_ids" role="tab" aria-controls="nav-list_of_site_ids"
                          aria-selected="false">List of Site IDs</a>
                          <a class="nav-item nav-link" id="nav-list_of_branding-tab" data-toggle="tab"
                          href="#office-branding" role="tab" aria-controls="nav-list_of_site_ids"
                          aria-selected="false">Office Branding</a>
                      </div>
                    </nav>

                    <div class="tab-content pl-0 pt-2" id="nav-tabContent">
                      <!--Rental Payment Details-->
                      <div class="tab-pane fade" id="office-branding" role="tabpanel"
                      aria-labelledby="nav-list_of_branding-tab">
                      <div class="row mb-2">
                        <div class="col-lg-4 spacing-right">
                          Branding Type <br>
                          <input class="input_field" type="text" name="staff_name[]" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-left spacing-right">
                          Picture of Branding <br>
                          <input class="input_field" type="file" name="employee_no[]" placeholder="" style="width: 100%;">
                        </div>
                        <div class="col-lg-3 spacing-left">
                          Site of Branding. <br>
                          <input class="input_field" type="text" name="designation[]" placeholder="..." style="width: 100%;">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-lg-4 spacing-right">
                          Branding Cost <br>
                          <input class="input_field basic-info-attachements" type="text" name="office_no[]" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 spacing-right">
                        <div class="form-check">
                          <div class="row">
                            <div class="col-4">
                                <label class="form-check-label" for="exampleFormControlTextarea1">Periodical Maintenance</label>
                            </div>
                            <div class="col-4">
                                <input type="checkbox" class="form-check-input" id="maintenanceCheckbox"  />
                            </div>
                          </div>
                        </div>
                        </div>
                        <div class="maintenance" style="display:none;">
                          <div class="row mb-2">
                            <div class="col-lg-4 spacing-right">
                              Maintenance Date <br>
                              <input class="input_field" type="date" name="staff_name[]" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-4 spacing-right">
                              <div class="form-check">
                                <div class="row">
                                  <div class="col-4">
                                      <label class="form-check-label" for="exampleFormControlTextarea1">Replaced</label>
                                  </div>
                                  <div class="col-4">
                                      <input type="checkbox" class="form-check-input" id="exampleFormControlTextarea1" />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 spacing-right">
                              <div class="form-check">
                                  <div class="row">
                                    <div class="col-4">
                                        <label class="form-check-label" for="exampleFormControlTextarea1">Required</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="checkbox" class="form-check-input" id="exampleFormControlTextarea1" />
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="new_branch mt-2">
                          <button type="button" id="add_new_renewal_btn">
                              Submit
                          </button>
                        </div>
                        <div class="vendor" style="position:relative; left:5%;">
                          <h5>Details Of Vendor</h5>
                          <div class="row mb-2">
                          <div class="col-lg-4 spacing-right">
                            Vendor Number <br>
                            <input class="input_field" type="text" name="staff_name[]" placeholder="..." style="width: 100%;">
                          </div>
                          <div class="col-lg-4 spacing-left spacing-right">
                            Name <br>
                            <input class="input_field" type="file" name="employee_no[]" placeholder="" style="width: 100%;">
                          </div>
                          <div class="col-lg-3 spacing-left">
                            Cell Number <br>
                            <input class="input_field" type="text" name="designation[]" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        <div class="address" style="position:relative;">
                        <h5 >Address</h5>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Office No <br> <input class="input_field" id="head_office_cell_no" name="c_office" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Building <br> <input class="input_field" id="head_office_cell_no" name="c_building" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Block <br> <input class="input_field" id="head_office_cell_no" name="c_block" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Area <br> <input class="input_field" id="head_office_cell_no" name="c_area" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                City <br> <input class="input_field" id="head_office_cell_no" name="c_city" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Photograph of Building <br> <input class="input_field" id="" name="c_photo" type="file" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Email <br> <input class="input_field" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                Website <br> <input class="input_field" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-5 spacing-right">
                                Pin location <br> <input class="input_field" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-5 spacing-left">
                                GPS <br> <input class="input_field" id="" name="c_pin" type="text" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                        <div class="row mb-2 mt-4">
                          <div class="col-lg-5 spacing-right">
                              Notes <br> <textarea class="input_field" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                          </div>
                          <div class="col-lg-5 spacing-left spacing-right">
                              Attachments <br> <input class="input_field" id="head_office_email" name="audit_sign" type="file" placeholder="..." style="width: 100%;">
                          </div>
                        </div>
                        </div>
                      </div>
                      </div>
                      </div>
                      <!--Rental Payment Details-->
                      <div class="tab-pane fade" id="nav-office" role="tabpanel"
                      aria-labelledby="nav-staff_details-tab">
                      <div class=" row main-content div">
                        <h5>UPS :</h5>
                        <div class="col-lg-12">
                          <div class="row mb-2">
                              <div class="col-lg-4 spacing-right ">
                                  Inventory Code : <br> <input class="input_field" id="head_office_name" name="audit_file" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-right">
                                  Notes <br> <textarea class="input_field" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                              </div>
                              <div class="col-lg-4 spacing-left spacing-right">
                                  Attachments <br> <input class="input_field" id="head_office_email" name="audit_sign" type="file" placeholder="..." style="width: 100%;">
                              </div>

                          </div>
                        </div>
                        <h5>PhotoCopier :</h5>
                        <div class="col-lg-12">
                          <div class="row mb-2">
                              <div class="col-lg-4 spacing-right ">
                                  Inventory Code : <br> <input class="input_field" id="head_office_name" name="audit_file" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-right">
                                  Notes <br> <textarea class="input_field" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                              </div>
                              <div class="col-lg-4 spacing-left spacing-right">
                                  Attachments <br> <input class="input_field" id="head_office_email" name="audit_sign" type="file" placeholder="..." style="width: 100%;">
                              </div>

                          </div>
                        </div>
                        <h5>Generator :</h5>
                        <div class="col-lg-12">
                          <div class="row mb-2">
                              <div class="col-lg-4 spacing-right ">
                                  Inventory Code : <br> <input class="input_field" id="head_office_name" name="audit_file" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-right">
                                  Notes <br> <textarea class="input_field" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                              </div>
                              <div class="col-lg-4 spacing-left spacing-right">
                                  Attachments <br> <input class="input_field" id="head_office_email" name="audit_sign" type="file" placeholder="..." style="width: 100%;">
                              </div>

                          </div>
                        </div>
                        <h5>Furniture :</h5>
                        <div class="col-lg-12">
                          <div class="row mb-2">
                              <div class="col-lg-4 spacing-right ">
                                  Inventory Code : <br> <input class="input_field" id="head_office_name" name="audit_file" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-right">
                                  Notes <br> <textarea class="input_field" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                              </div>
                              <div class="col-lg-4 spacing-left spacing-right">
                                  Attachments <br> <input class="input_field" id="head_office_email" name="audit_sign" type="file" placeholder="..." style="width: 100%;">
                              </div>

                          </div>
                        </div>
                        <h5>Crockery Items :</h5>
                        <div class="col-lg-12">
                          <div class="row mb-2">
                              <div class="col-lg-4 spacing-right ">
                                  Inventory Code : <br> <input class="input_field" id="head_office_name" name="audit_file" type="text" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-right">
                                  Notes <br> <textarea class="input_field" id="head_office_name" name="audit_date" type="text" placeholder="..." style="width: 100%;"></textarea>
                              </div>
                              <div class="col-lg-4 spacing-left spacing-right">
                                  Attachments <br> <input class="input_field" id="head_office_email" name="audit_sign" type="file" placeholder="..." style="width: 100%;">
                              </div>

                          </div>
                        </div>
                    </div>
                    <div class="col-lg-2 spacing-left my-3">
                        <button type="button" class="add-more-btn" onclick="audits_add_more()">Add More</button>
                      </div>

                      <div id="audits_add_more"></div>
                      </div>
                      <!--Rental Payment Details-->
                      <div class="tab-pane fade" id="nav-py_details" role="tabpanel"
                        aria-labelledby="nav-staff_details-tab">
                        <div class="row">
                            <div class="col-lg-12 spacing-right mb-4">
                                <!-- <div class="col-lg-3" style="
                                    margin-bottom: 40px;
                                    width: 25%;">
                                        <button type="button" class="add-more-btn" onclick=""> + new Rental Payment Details</button>
                                </div> -->
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            RP No.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3">
                                          Amount of Advance. <br>  <input class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3">
                                          Instrument No. <br>  <input class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="row">

                                      <div class="col-lg-4">
                                        Voucher No. <br>  <input class="input_field basic-info-attachements" id="" type="text" name="insp_pic" placeholder="..." style="width: 100%;" multiple>
                                      </div>
                                      <div class="col-lg-3 spacing-left">
                                          Name of Bank <br>  <input class="input_field basic-info-attachements" id="inpFile2" type="text" name="insp_attach" placeholder="..." style="width: 100%;" multiple>
                                       </div>
                                       <div class="col-lg-4">
                                          Attachments. <br>  <input class="input_field basic-info-attachements" id="" type="file" name="insp_pic" placeholder="..." style="width: 100%;" multiple>
                                        </div>
                                    </div>
                                    <div class="row">

                                      <div class="col-lg-4">
                                          Notes <br>  <textarea class="input_field basic-info-attachements" id="" type="text" name="insp_pic" placeholder="..." style="width: 100%;" multiple></textarea>
                                      </div>


                                    </div>
                                    <div id="rental-container">
                                      <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                          Rental Amount. <br>
                                          <input class="input_field" type="text" name="rental_amount[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                          Agreement Execution Date: <br>
                                          <input class="input_field" type="date" name="agreement_execution_date[]" placeholder="" style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-left">
                                          Agreement End date: <br>
                                          <input class="input_field" type="date" name="agreement_end_date[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-3 spacing-right">
                                          Agreement Attachment: <br>
                                          <input class="input_field" type="file" name="agreement_attachment[]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-5 mt-4" style="width: 50%;">
                                          <button type="button" onclick="addMoreRentalFields()">Add More</button>
                                        </div>
                                      </div>
                                    </div>

                            </div>
                        </div>
                      </div>
                      <!-- staff Details -->
                      <div class="tab-pane fade" id="nav-staff_details" role="tabpanel"
                        aria-labelledby="nav-staff_details-tab">
                        {{-- <div class="row d-flex justify-content-center m-auto">
                          <div class="col-lg-6">
                            <p><strong>Manager Operation</strong></p>
                            <div class="row">
                              <div class="col-6">
                                <label for="mo_name" class="control-label mb-0 ">Manager Operation
                                  Name</label>
                                <input id="mo_name" value="" name="mo_name" type="text" class="input-field" aria-="true"
                                  aria-invalid="false">
                                <div class="mt-1">
                                </div>
                              </div>

                              <div class="col-6 ">
                                <label for="mo_cell_no" class="control-label mb-0 ">Manager Operation
                                  Cell No</label>
                                <input id="mo_cell_no" value="" name="mo_cell_no" type="text" class="input-field"
                                  aria-="true" aria-invalid="false">
                                <div class="mt-0">
                                </div>
                              </div>

                              <div class="col-12">
                                <label for="mo_email" class="control-label mb-0">Manager Operation
                                  Email</label>
                                <input id="mo_email" value="" name="mo_email" type="text" class="input-field"
                                  aria-="true" aria-invalid="false" style="width: 75%;">
                                <div class="mt-0">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <p><strong>Field Supervisor</strong></p>
                            <div class="row">
                              <div class="col-6">
                                <label for="field_supervisor_name" class="control-label mb-0">Field
                                  Supervisor Name</label>
                                <input id="field_supervisor_name" value="" name="field_supervisor_name" type="text"
                                  class="input-field" aria-="true" aria-invalid="false">
                                <div class="mt-0">
                                </div>
                              </div>
                              <div class="col-6">
                                <label for="field_supervisor_email" class="control-label mb-0">Field
                                  Supervisor Email</label>
                                <input id="field_supervisor_email" value="" name="field_supervisor_email" type="text"
                                  class="input-field" aria-="true" aria-invalid="false">
                                <div class="mt-0">
                                </div>
                              </div>
                              <div class="col-12 mb-3">
                                <label for="field_supervisor_cell_no" class="control-label mb-0">Field Supervisor Cell
                                  No</label>
                                <input id="field_supervisor_cell_no" value="" name="field_supervisor_cell_no"
                                  type="text" class="input-field" aria-="true" aria-invalid="false" style="width: 75%;">
                                <div class="mt-0">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-lg-12">
                          <p><strong>Front Desk Officer</strong></p>
                          <div class="row">
                            <div class="col-3">
                              <label for="fdo_name" class="control-label mb-0">Front Desk Officer
                                Name</label>
                              <input id="fdo_name" value="" name="fdo_name" type="text" class="input-field" aria-="true"
                                aria-invalid="false">
                              <div class="mt-0">
                              </div>
                            </div>
                            <div class="col-3">
                              <label for="fdo_email" class="control-label mb-0">Front Desk Officer
                                Email</label>
                              <input id="fdo_email" value="" name="fdo_email" type="text" class="input-field"
                                aria-="true" aria-invalid="false">
                              <div class="mt-0">
                              </div>
                            </div>
                            <div class="col-3 mb-3">
                              <label for="fdo_cell_no" class="control-label mb-0">Front Desk
                                Officer Cell No</label>
                              <input id="fdo_cell_no" value="" name="fdo_cell_no" type="text" class="input-field"
                                aria-="true" aria-invalid="false" style="width: 100%;">
                              <div class="mt-0">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12 mb-5">
                        </div> --}}
                        <div id="staff-details-container">
                        <div class="row">
                          <div class="col-lg-12 spacing-right">
                            <div class="col-lg-3" style="margin-bottom: 40px; width: 25%;">
                              <button type="button" class="add-more-btn" onclick="addMoreStaff()"> + new Staff</button>
                            </div>
                            <div class="row mb-2">
                              <div class="col-lg-4 spacing-right">
                                Name. <br>
                                <input class="input_field" type="text" name="staff_name[]" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-4 spacing-left spacing-right">
                                Employee No: <br>
                                <input class="input_field" type="text" name="employee_no[]" placeholder="" style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-left">
                                Designation. <br>
                                <input class="input_field" type="text" name="designation[]" placeholder="..." style="width: 100%;">
                              </div>
                            </div>
                            <div class="row mb-3">
                              <div class="col-lg-4 spacing-right">
                                Office No. <br>
                                <input class="input_field basic-info-attachements" type="text" name="office_no[]" placeholder="..." style="width: 100%;">
                              </div>
                              <div class="col-lg-3 spacing-left">
                                Email <br>
                                <input class="input_field basic-info-attachements" type="text" name="email[]" placeholder="..." style="width: 100%;">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>

                      <!-- weapon detail-->
                      <div class="tab-pane fade pl-3" id="nav-strong-room" role="tabpanel"
                        aria-labelledby="nav-strong-room-tab">
                        <div class="row">
                            <div class="col-lg-12 spacing-right">
                              <div class="form-check form-check-inline spacing-left mt-2">
                                  <input class="form-check-input" type="checkbox" id="kote_incharge" value="negative">
                                  <h5 class="form-check-label" for="inlineCheckbox1">Kote Incharge :</h5>
                              </div>
                              <div class="col-lg-12 spacing-right mb-4" id="kote-field" style="display:none;">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Name.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Cell No: <br>  <input class="input_field" type="text" name="insp_name" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Email. <br>  <input class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;">
                                      </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-4 spacing-right">
                                    Kote No. <br>  <input class="input_field basic-info-attachements" id="" type="text" name="insp_pic" placeholder="..." style="width: 100%;" multiple>
                                  </div>
                                  <div class="col-lg-4 pt-1 spacing-right">
                                    Kote Picture  <br>  <input class="input_field" name="photo" id="inpFile43" type="file" placeholder="..." style="width: 100%;">
                                    <div class="col-lg-5 spacing-right">
                                      <!--Image Preview Biometric-->
                                      <div class="image-preview43" id="imagePreview43">
                                      <img src="" alt="Image Preview43" class="image-preview__image43" style="height: 100%; width:100%; margin-left:-15px;">
                                      <span class="image-preview__default-text43"> Image Preview </span>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- <div class="col-lg-3 spacing-left my-5">
                                    <button type="button" class="add-more-btn" onclick=""> + Weapon to Kote</button>
                                  </div> -->
                                </div>
                              </div>
                              <div class="form-check form-check-inline spacing-left mt-2">
                                  <input class="form-check-input" type="checkbox" id="armorer" value="negative">
                                  <h5 class="form-check-label" for="inlineCheckbox1">Armorer Details :</h5>
                              </div>
                              <div class="col-lg-12 spacing-right mb-4" id="armorer-field" style="display:none;">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Name.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Cell No: <br>  <input class="input_field" type="text" name="insp_name" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Email. <br>  <input class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;">
                                      </div>
                                </div>
                              </div>
                            </div>
                            <h5 style="margin-bottom: 15px;">Kote Summary (Weapon)</h5>
                            <div class="row mb-2">

                                <table class="table table-striped-columns" style="margin-left:12px;">
                                    <thead>
                                    <tr class="table-bordered table-active">
                                        <th scope="">Category</th>
                                        <th scope="">
                                            222 Bore
                                            <img src="weapon/222.png" class="small-icon" onclick="showPopup(this)" title="222 Bore" style="height:30px; width:50px; position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <div style="position: relative; display: inline-block;">
                                                    <img src="weapon/222.png" style="height: 300px; width: 500px;" />
                                                    <div style="position: absolute; top: 80%; left: 77%; transform: translate(65%, -78%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center;">
                                                        Type : Rifle
                                                    </div>
                                                    <div style="position: absolute; top: 91%; left: 101%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 90%;">
                                                        Caliber : 222 Bore
                                                    </div>
                                                </div>
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">
                                            223 Bore
                                            <img src="weapon/223.png" class="small-icon" onclick="showPopup(this)" title="222 Bore" style="height:30px; width:50px; position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <div style="position: relative; display: inline-block;">
                                                    <img src="weapon/223.png" style="height: 300px; width: 500px;" />
                                                    <div style="position: absolute; top: 80%; left: 77%; transform: translate(65%, -78%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center;">
                                                        Type : Rifle
                                                    </div>
                                                    <div style="position: absolute; top: 91%; left: 101%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 90%;">
                                                        Caliber : 223 Bore
                                                    </div>
                                                </div>
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>

                                        <th scope="">
                                            30 Bore
                                            <img src="weapon/30.png" class="small-icon" onclick="showPopup(this)" title="222 Bore" style="height:30px; width:50px; position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <div style="position: relative; display: inline-block;">
                                                    <img src="weapon/30.png" style="height: 300px; width: 500px;" />
                                                    <div style="position: absolute; top: 80%; left: 73%; transform: translate(65%, -78%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center;">
                                                        Type : Kalakove
                                                    </div>
                                                    <div style="position: absolute; top: 91%; left: 101%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 90%;">
                                                        Caliber : 222 Bore
                                                    </div>
                                                </div>
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">
                                            7mm
                                            <img src="weapon/7mm.png" class="small-icon" onclick="showPopup(this)" title="222 Bore" style="height:30px; width:50px; position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <div style="position: relative; display: inline-block;">
                                                    <img src="weapon/7mm.png" style="height: 300px; width: 500px;" />
                                                    <div style="position: absolute; top: 80%; left: 77%; transform: translate(65%, -78%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center;">
                                                        Type : Rifle
                                                    </div>
                                                    <div style="position: absolute; top: 91%; left: 99%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 90%;">
                                                        Caliber : 7mm
                                                    </div>
                                                </div>
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">
                                            9mm
                                            <img src="weapon/9mm.png" class="small-icon" onclick="showPopup(this)" title="222 Bore" style="height:30px; width:50px; position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <div style="position: relative; display: inline-block;">
                                                    <img src="weapon/9mm.png" style="height: 300px; width: 500px;" />
                                                    <div style="position: absolute; top: 80%; left: 77%; transform: translate(65%, -78%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center;">
                                                        Type : MP5
                                                    </div>
                                                    <div style="position: absolute; top: 91%; left: 99%; transform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 90%;">
                                                        Caliber : 9mm
                                                    </div>
                                                </div>
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">
                                            44 Bore
                                            <img src="weapon/44.png" class="small-icon" onclick="showPopup(this)" title="222 Bore" style="height:30px; width:50px; position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <div style="position: relative; display: inline-block;">
                                                    <img src="weapon/44.png" style="height: 300px; width: 500px;" />
                                                    <div style="position: absolute; top: 91%; left: 101%; transform: translate(-66%, -121%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 90%;">
                                                        Type : Rifle with Binocular
                                                    </div>
                                                    <div style="position: absolute; top: 91%; left: 101%; transform: translate(-98%, -14%); background-color: rgba(0, 0, 0, 0.5); color: white; padding: 10px; text-align: center; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 90%;">
                                                        Caliber : 44 Bore
                                                    </div>
                                                </div>
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">Any other</th>
                                        <th scope="">Grand Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-bordered">
                                            <tr>
                                                <th scope="row">
                                                    In Kote
                                                </th>
                                                <td>10</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Deployed
                                                </th>
                                                <td>4</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Total
                                                </th>
                                                <td>14</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>14</td>
                                            </tr>
                                        </tr>
                                    </tbody>
                                  </table>
                            </div>
                            <h5 style="margin-bottom: 15px;">Kote Summary (Ammunition)</h5>
                            <div class="row mb-2">
                                <table class="table table-striped-columns" style="margin-left:12px;">
                                    <thead>
                                    <tr class="table-bordered table-active">
                                        <th scope="">Category</th>
                                        <th scope="">222 Bore <img src="weapon/222b.png" class="small-icon" onclick="showPopup(this)" style="height:30px; width:50px; position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <img src="weapon/222b.png" style="height: 300px; width: 500px;" />
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">223 <img src="weapon/223bu.png" class="small-icon" onclick="showPopup(this)" style="height:30px; width:50px;  position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <img src="weapon/223bu.png" style="height: 300px; width: 500px;" />
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">30 Bore <img src="weapon/30bu.png" class="small-icon" onclick="showPopup(this)" style="height:30px; width:50px; position:relative; left:15%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <img src="weapon/30bu.png" style="height: 300px; width: 500px;" />
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">7mm <img src="weapon/7b.png" class="small-icon" onclick="showPopup(this)" style="height:30px; width:50px; position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <img src="weapon/7b.png" style="height: 300px; width: 500px;" />
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">9mm <img src="weapon/9b.png" class="small-icon" onclick="showPopup(this)" style="height:30px; width:50px; position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <img src="weapon/9b.png" style="height: 300px; width: 500px;" />
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">44 Bore <img src="weapon/44b.png" class="small-icon" onclick="showPopup(this)" style="height:30px; width:50px; position:relative; left:20%;" />
                                            <div class="popup" style=" display: none;
                                                  position: fixed;
                                                  top: 50%;
                                                  left: 50%;
                                                  transform: translate(-50%, -50%);
                                                  background-color: white;
                                                  padding: 20px;
                                                  border: 1px solid black;
                                                  z-index: 9999;
                                                  width: 600px;">
                                                <img src="weapon/44b.png" style="height: 300px; width: 500px;" />
                                                <span class="close-btn" style="position: absolute;
                                                  top: 5px;
                                                  right: 5px;
                                                  cursor: pointer;
                                                  font-size: 20px;" onclick="hidePopup(this)">&#10006;</span>
                                            </div>
                                        </th>
                                        <th scope="">Any other </th>
                                        <th scope="">Grand Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-bordered">
                                            <tr>
                                                <th scope="row">
                                                    In Kote
                                                </th>
                                                <td>10</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>10</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Deployed
                                                </th>
                                                <td>4</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Total
                                                </th>
                                                <td>14</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>14</td>
                                            </tr>
                                        </tr>
                                    </tbody>
                                  </table>
                            </div>
                            <h5 style="margin-bottom: 15px;">Kote Summary (License)</h5>
                            <div class="row mb-2">
                                <table class="table table-striped-columns" style="margin-left:12px;">
                                    <thead>
                                    <tr class="table-bordered table-active">
                                        <th scope="">Category</th>
                                        <th scope="">222 Bore</th>
                                        <th scope="">223</th>
                                        <th scope="">30 Bore</th>
                                        <th scope="">7mm</th>
                                        <th scope="">9mm</th>
                                        <th scope="">44 Bore</th>
                                        <th scope="">Any other</th>
                                        <th scope="">Grand Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-bordered">
                                            <tr>
                                                <th scope="row">
                                                    Islamabad
                                                </th>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    KPK
                                                </th>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Punjab
                                                </th>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Sindh
                                                </th>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Islamabad<br>All Pakistan
                                                </th>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    KPK<br>All Pakistan
                                                </th>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Punjab<br>All Pakistan
                                                </th>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Sindh<br>All Pakistan
                                                </th>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Any other<br>All Pakistan
                                                </th>
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>2</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    Total<br>All Pakistan
                                                </th>
                                                <td>16</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>16</td>
                                            </tr>
                                        </tr>
                                    </tbody>
                                  </table>
                            </div>
                            <div class="form-check form-check-inline spacing-left mt-2">
                              <input class="form-check-input" type="checkbox" id="deploy-weapon" value="negative">
                              <h5 class="form-check-label" for="inlineCheckbox1">Deploy Weapon and Ammunition</h5>
                            </div>
                            <div class="col-lg-12 spacing-right mb-4" id="deploy-weapon-field" style="display: none;">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Site No.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Category of Weapon: <br>  <input class="input_field" type="text" name="insp_name" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Quantity. <br>  <input class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;">
                                     </div>

                                </div>
                                <div class="row">
                                  <div class="col-lg-4 spacing-right">
                                    Category of Ammunition. <br>  <input class="input_field basic-info-attachements" id="" type="text" name="insp_pic" placeholder="..." style="width: 100%;" multiple>
                                  </div>
                                  <div class="col-lg-4 spacing-left">
                                      Quantity <br>  <input class="input_field basic-info-attachements" id="inpFile2" type="text" name="insp_attach" placeholder="..." style="width: 100%;" multiple>
                                   </div>
                                   <div class="col-lg-4 spacing-left">
                                    Attachments <br>  <input class="input_field basic-info-attachements" id="inpFile2" type="file" name="insp_attach" placeholder="..." style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-4">
                                        Notes. <br>  <textarea class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;"></textarea>
                                     </div>
                                </div>
                            </div>
                            <div class="form-check form-check-inline spacing-left mt-2">
                              <input class="form-check-input" type="checkbox" id="recover-weapon" value="negative">
                              <h5 class="form-check-label" for="inlineCheckbox1">Recover Weapon and Ammunition</h5>
                            </div>
                            <div class="col-lg-12 spacing-right mb-4" id="recover-weapon-field" style="display: none;">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Site No.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Category of Weapon: <br>  <input class="input_field" type="text" name="insp_name" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Quantity. <br>  <input class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;">
                                     </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-4 spacing-right">
                                    Category of Ammunition. <br>  <input class="input_field basic-info-attachements" id="" type="text" name="insp_pic" placeholder="..." style="width: 100%;" multiple>
                                  </div>
                                  <div class="col-lg-4 spacing-left">
                                      Quantity <br>  <input class="input_field basic-info-attachements" id="inpFile2" type="text" name="insp_attach" placeholder="..." style="width: 100%;" multiple>
                                   </div>
                                   <div class="col-lg-4 spacing-left">
                                    Attachments <br>  <input class="input_field basic-info-attachements" id="inpFile2" type="file" name="insp_attach" placeholder="..." style="width: 100%;" multiple>
                                    </div>
                                    <div class="col-lg-4 ">
                                        Notes. <br>  <textarea class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;"></textarea>
                                     </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-12 mb-0" style="margin-left: -1rem; margin-top: 1rem;">
                          <p><strong>Armorer Details</strong></p>
                          <div class="row">
                            <div class="col-3 mb-0">
                              <label for="armoral_name" class="control-label mb-0">Authorited person of Kote</label>
                              <input id="armoral_name" value="" name="armoral_name" type="text" class="input-field"
                                aria-="true" aria-invalid="false">
                              <div class="mt-0">
                              </div>
                            </div>
                            <div class="col-3 mb-0">
                              <label for="armoral_cnic" class="control-label mb-0">Armorer
                                CNIC</label>
                              <input id="armoral_cnic" value="" name="armoral_cnic" type="file" class="input-field"
                                aria-="true" aria-invalid="false">
                              <div class="imageGallery1">
                                <a href="assets/ai.jpg" title="Caption for gallery item 1"><img src="assets/ai.jpg"
                                    height="20" width="20" alt="Gallery image 1" /></a>
                              </div>
                              <div class="mt-0">
                              </div>
                            </div>
                            <div class="col-3 mb-0">
                              <label for="armoral_cell_no" class="control-label mb-0">Armorer Cell
                                No</label>
                              <input id="armoral_cell_no" value="" name="armoral_cell_no" type="text"
                                class="input-field" aria-="true" aria-invalid="false">
                              <div class="mt-3">
                              </div>
                            </div>
                            <div class="col-3 mb-0">
                              <label for="armoral_email" class="control-label mb-0">Armorer
                                Email</label>
                              <input id="armoral_email" value="" name="armoral_email" type="text" class="input-field"
                                aria-="true" aria-invalid="false">
                              <div class="mt-0">
                              </div>
                            </div>
                          </div>
                        </div> --}}

                      </div>

                      <div class="tab-pane fade" id="nav-store" role="tabpanel" aria-labelledby="nav-store-tab">
                        <!-- <div class="col-lg-3" style="
                                    margin-bottom: 20px;
                                    width: 25%;">
                                        <button type="button" class="add-more-btn" onclick=""> + new Store Keeper</button>
                        </div> -->
                        <div class="col-lg-12 spacing-right">
                          <h5>Uniform Incharge</h5>
                            <div class="row mb-2">
                                <div class="col-lg-4 spacing-right">
                                    Name.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-left spacing-right">
                                    Cell No: <br>  <input class="input_field" type="text" name="insp_name" placeholder="" style="width: 100%;">
                                </div>
                                <div class="col-lg-3 spacing-left">
                                    Email. <br>  <input class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;">
                                  </div>
                            </div>
                          </div>
                        <h5 style="margin-bottom: 15px;">Details of Uniform</h5>

                          <br>

                          <div class="form-check form-check-inline spacing-left mt-2">
                              <input class="form-check-input" type="checkbox" id="deploy_uni" value="negative">
                              <h5 class="form-check-label" for="inlineCheckbox1">Deploy Uniform</h5>
                          </div>
                            <div class="col-lg-12 spacing-right mb-4" id="uniform-field" style="display:none;">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Site ID.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Category of Uniform Item: <br>  <input class="input_field" type="text" name="insp_name" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Quantity. <br>  <input class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;">
                                     </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                      Notes. <br>  <textarea class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                   <div class="col-lg-4">
                                    Attachments <br>  <input class="input_field basic-info-attachements" id="inpFile2" type="file" name="insp_attach" placeholder="..." style="width: 100%;" multiple>
                                    </div>

                                </div>
                                <div class="cl-lg-12">

                                </div>
                            </div>
                            <div class="form-check form-check-inline spacing-left mt-2">
                              <input class="form-check-input" type="checkbox" id="recover_uni" value="negative">
                              <h5 class="form-check-label" for="inlineCheckbox1">Recover Uniform</h5>
                            </div>
                            <div class="col-lg-12 spacing-right mb-4" id="uniform-recover" style="display:none;">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                        Site ID.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left spacing-right">
                                        Category of Uniform Item: <br>  <input class="input_field" type="text" name="insp_name" placeholder="" style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Quantity. <br>  <input class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;">
                                     </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                      Notes. <br>  <textarea class="input_field" type="text" name="caste" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                   <div class="col-lg-4">
                                    Attachments <br>  <input class="input_field basic-info-attachements" id="inpFile2" type="file" name="insp_attach" placeholder="..." style="width: 100%;" multiple>
                                    </div>

                                </div>
                            </div>
                            <table class="table table-hover table-bordered">
                              <thead class="table-active">
                                  <tr>
                                  <th><label>Lot No</label></th>
                                  <th><label>Site ID</label></th>
                                  <th colspan="2"><label>Uniform</label></th>
                                  <th><label>Qunatity</label></th>
                                  <th colspan="2"><label>Shoes</label></th>
                                  <th><label>Complete Bin</label></th>

                                  </tr>
                              </thead>
                              <thead class="table-active">
                                  <tr>
                                  <th><label></label></th>
                                  <th><lbael></lbael></th>
                                  <th><label>New</label></th>
                                  <th><lbael>Used</lbael></th>
                                  <th><label></label></th>
                                  <th><label>New</label></th>
                                  <th><lbael>Used</lbael></th>
                                  <th><lbael></lbael></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                  <td><label></label></td>
                                  <td ><label></label></td>
                                  <td><label></label></td>
                                  <td><label></label></i></td>
                                  <td><label></label></td>
                                  </tr>
                                  <tr>
                                  <td><label></label></td>
                                  <td><label></label></td>
                                  <td><label></label></td>
                                  <td><label></label></td>
                                  <td><label></label></td>
                                  </tr>
                              </tbody>
                            </table>
                      </div>
                      <!-- daily branch report -->
                      <div class="tab-pane fade" id="nav-branch_report" role="tabpanel"
                        aria-labelledby="nav-branch_report-tab">
                          <div class="col-lg-12">
                          <table class="mt-3 mb-5">
                            <thead>
                            <tr class="table-bordered table-active">
                                <th scope="">Site id</th>
                                <th scope="">Branch</th>
                                <th scope="">Location</th>
                                <th scope="">Authorized Guards</th>
                                <th scope="">Army</th>
                                <th scope="">SSG</th>
                                <th scope="">Civil</th>
                                <th scope="">Absentees</th>
                                <th scope="">Leave</th>
                                <th scope="">Reason</th>
                                <th scope="">Reliver Provided</th>
                                <th scope="">Last Complain Date</th>
                                <th scope="">Any Incident & Report No</th>
                                <th scope="">Any Fire</th>
                                <th scope="">No of new guards hired</th>
                                <th scope="">Pending Nadra Versys</th>
                                <th scope="">Unsent DPO Reports</th>
                                <th scope="">No. of resigns</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="table-bordered">
                                <th scope="">1001</th>
                                <th scope="">10</th>
                                <th scope="">4</th>
                                <th scope="">3</th>
                                <th scope="">2</th>
                                <th scope="">5</th>
                                <th scope="">2</th>
                                <th scope="">2</th>
                                <th scope="">1</th>
                                <th scope="">5</th>
                                <th scope="">1</th>
                                <th scope="">10</th>
                                <th scope="">4</th>
                                <th scope="">5</th>
                                <th scope="">1</th>
                                <th scope="">4</th>
                                <th scope="">Talha</th>
                                <th scope="">talha</th>
                                </tr>
                                <tr class="table-bordered">
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                <th scope="">//</th>
                                </tr>
                            </tbody>
                          </table>
                          <br>
                          <table class="mt-3">
                            <thead>
                            <tr class="table-bordered table-active">
                                <th scope="">Guards without bank started</th>
                                <th scope="">Any new Site Started</th>
                                <th scope="">No. of Guards</th>
                                <th scope="">Details of Escort Duties</th>
                                <th scope="">Amount of pending Recoveries</th>
                                <th scope="">Signature of Manager Accounts</th>
                                <th scope="">Any staff on annual leave</th>
                                <th scope="">Any short leave of staff with Name</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr class="table-bordered">
                                <th scope="">5</th>
                                <th scope="">10</th>
                                <th scope="">4</th>
                                <th scope="">3</th>
                                <th scope="">2</th>
                                <th scope="">5</th>
                                <th scope="">2</th>
                                <th scope="">2</th>
                                </tr>
                            </tbody>
                          </table>
                          </div>
                      </div>

                      <!--rental-property-details-->
                      <div class="tab-pane fade show active" id="nav-rp_details" role="tabpanel"
                        aria-labelledby="nav-rp_details-tab" style="background-color:#cccccc;">
                        <div class="col-lg-12" id="rental_box">
                          <!-- <p><strong>Rental Property Details</strong></p> -->
                          <!--Whole Rental-->

                          <input id="rp_id" type="hidden" name="rp_id[]" value="">
                          <div class="card" id="rental_1">
                            <div class="card-body" style="background: linear-gradient(to bottom, #ffffff 0%, #e3e2e2);">
                              <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3" style="
                                    margin-bottom: 40px;
                                    width: 25%;">
                                        <button type="button" id="add-more-btn" class="add-more-btn">+ Add new Property</button>
                                    </div>
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    RP Number <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Type of Property <br> <select id="" class="input_field" name="" style="width: 100%;">
                                                        <option value="">RHQ</option>
                                                        <option value="">Guards Accommodation</option>
                                                      </select>
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Description of Property <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Picture of Property <br> <input class="input_field"
                                                        id="head_office_email" id="inpFile4" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;"><div class="col-lg-4 spacing-right">
                                                <!--Image Preview Biometric-->
                                                <div class="image-preview4" id="imagePreview4">
                                                    <img src="" alt="Image Preview4" class="image-preview__image4" style="height: 30%; width:30%;">
                                                    <span class="image-preview__default-text4"> Image Preview </span>
                                                </div>
                                            </div>

                                                </div>

                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Branch ID <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Reporting to <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="form-check form-check-inline spacing-left mt-2">
                                                    <input class="form-check-input" type="checkbox" id="prop_care" value="negative">
                                                    <h5 class="form-check-label" for="inlineCheckbox1">Property Caretaker Details :</h5>
                                                </div>
                                                <div class="col-lg-12 spacing-right mb-4" id="prop-field" style="display:none;">
                                                  <div class="col-lg-6 spacing-left spacing-right">
                                                      Name <br> <input class="input_field"
                                                          id="head_office_email" name="head_office_email[]"
                                                          type="text" placeholder="..."
                                                          style="width: 100%;">
                                                  </div>
                                                  <div class="col-lg-6 spacing-left spacing-right">
                                                      Cell <br> <input class="input_field"
                                                          id="head_office_email" name="head_office_email[]"
                                                          type="text" placeholder="..."
                                                          style="width: 100%;">
                                                  </div>
                                                  <div class="col-lg-6 spacing-left spacing-right">
                                                      CNIC <br> <input class="input_field"
                                                          id="head_office_email" name="head_office_email[]"
                                                          type="text" placeholder="..."
                                                          style="width: 100%;">
                                                  </div>
                                                  <div class="col-lg-6 spacing-left spacing-right">
                                                      Attachments <br> <input class="input_field"
                                                          id="head_office_email" name="head_office_email[]"
                                                          type="file" placeholder="..."
                                                          style="width: 100%;">
                                                  </div>
                                                </div>
                                                <div class="form-check form-check-inline spacing-left mt-2">
                                                    <input class="form-check-input" type="checkbox" id="plaza_m" value="negative">
                                                    <h5 class="form-check-label" for="inlineCheckbox1">Plaza Management Details :</h5>
                                                </div>
                                                <div class="col-lg-12 spacing-right mb-4" id="plaza-field" style="display:none;">
                                                  <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Name <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Cell <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                  </div>
                                                  <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Bank Name <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Account Number <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                  </div>
                                                  <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        CNIC <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Attachments <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="file" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="form-check form-check-inline spacing-left mt-2">
                                                    <input class="form-check-input" type="checkbox" id="incharge_m" value="negative">
                                                    <h5 class="form-check-label" for="inlineCheckbox1">Incharge of the Property :</h5>
                                                </div>
                                                <div class="col-lg-12 spacing-right mb-4" id="incharge-field" style="display:none;">
                                                  <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Name <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Employeee ID <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                  </div>
                                                  <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Designation <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Cell Number <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                  </div>
                                                  <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Email <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                        Attachments <br> <input class="input_field"
                                                            id="head_office_email" name="head_office_email[]"
                                                            type="file" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                  </div>
                                                </div>
                                            <div class="col-lg-6 mt-4" style="margin-bottom: 40px; width: 50%;">
                                                <button type="button" id="add-more-btn" class="add-more-btn" onclick="toggleHiddenDiv()">KITCHEN</button>
                                            </div>

                                            <div id="hidden-div" style="display: none;">
                                            <h5>Inventory Details:</h5>
                                              <div id="inventory-container">
                                                <div class="row mb-2">
                                                  <div class="col-lg-5 spacing-left spacing-right">
                                                    Item Code <br>
                                                    <input class="input_field" name="item_code[]" type="text" placeholder="..." style="width: 100%;">
                                                  </div>
                                                  <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br>
                                                    <input class="input_field" name="attachments[]" type="file" placeholder="..." style="width: 100%;">
                                                  </div>
                                                  <div class="col-lg-5 spacing-left spacing-right">
                                                    Notes <br>
                                                    <textarea class="input_field" name="notes[]" type="file" placeholder="..." style="width: 100%;"></textarea>
                                                  </div>
                                                  <div class="col-lg-5 mt-4" style="width: 50%;">
                                                    <button type="button" style="margin-top: 16px; margin-left: -9px;" onclick="addMoreFields()">Add More</button>
                                                  </div>
                                                </div>
                                              </div>
                                              <h5>Hygiene Policy:</h5>
                                                <div id="hygiene-container">
                                                  <div class="row mb-2">
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                      Attachments <br>
                                                      <input class="input_field" name="attachments[]" type="file" placeholder="..." style="width: 100%;">
                                                    </div>
                                                    <div class="col-lg-5 spacing-left spacing-right">
                                                      Notes <br>
                                                      <textarea class="input_field" name="notes[]" type="file" placeholder="..." style="width: 100%;"></textarea>
                                                    </div>
                                                    <div class="col-lg-5" style="width: 50%;">
                                                      <button type="button" onclick="addMoreHygieneFields()">Add More</button>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            </div>


                                        </div>

                                        <div class="col-lg-6 spacing-left">

                                            <h5>Address</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Building <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Block <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Area <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    City <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Location <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    PhotoGraph of Building <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="file"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    GPS <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="form-check form-check-inline spacing-left mt-2">
                                              <input class="form-check-input" type="checkbox" id="prop_owner" value="negative">
                                              <h5 class="form-check-label" for="inlineCheckbox1">Property  Owner Details :</h5>
                                            </div>
                                            <div class="col-lg-12 spacing-right mb-4" id="prop-owf" style="display:none;">
                                              <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Name <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Cell <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                              </div>
                                              <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Bank Name <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Account Number <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                              </div>
                                              <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    CNIC <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    NTN of property <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                              </div>
                                              </div>
                                            </div>
                                            <div class="form-check form-check-inline spacing-left mt-2">
                                              <input class="form-check-input" type="checkbox" id="prop_ntn" value="negative">
                                              <h5 class="form-check-label" for="inlineCheckbox1">Utility Bills :</h5>
                                            </div>
                                            <div class="col-lg-12 spacing-right mb-4" id="ntn-fields" style="display:none;">
                                              <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Electric Meter Reading <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                              </div>
                                              <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Gas Meter Reading <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                              </div>
                                              <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Date of moving in <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="date" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Date of Moving Out <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="date" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                              </div>
                                              <div class="row mb-2">
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" name="approved_com" type="checkbox" id="last_copy_checkbox" value="">
                                                        <label class="form-check-label" for="last_copy_checkbox">Last Copy of paid Bill</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-8" id="attachments_div" style="display:none;">
                                                    <div>
                                                        Attachments <br>
                                                        <input class="input_field" id="head_office_email" name="head_office_email[]" type="file" placeholder="..." style="width: 77%;">
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="rental_add_more"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="nav-moveable_assets" role="tabpanel"
                        aria-labelledby="nav-moveable_assets-tab">
                        <div class="col-lg-5 spacing-right">
                          <h6> Type of assets : </h5>
                          <div class="mb-2 d-flex align-items-center">
                            <div class="form-check form-check-inline spacing-left">
                              <input class="form-check-input" type="radio" name="vehicle" id="carcheck" value="car">
                              <label class="form-check-label" for="carcheck">Car</label>
                            </div>
                            <div class="form-check form-check-inline spacing-left">
                              <input class="form-check-input" type="radio" name="vehicle" id="bikecheck" value="bike">
                              <label class="form-check-label" for="bikecheck">Bike</label>
                            </div>
                          </div>
                        </div>
                          <div class="car" style="display:none;">
                            <div class=" row main-content div">
                              <div class="col-lg-6">
                                  <div class="row mb-2">
                                      <div class="col-lg-6 spacing-right">
                                          Car No. <br> <input class="input_field"
                                              id="head_office_name" name="head_office_name[]"
                                              type="text" placeholder="..."
                                              style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5 spacing-left spacing-right">
                                          Car Model <br> <input class="input_field"
                                              id="head_office_email" name="head_office_email[]"
                                              type="text" placeholder="..."
                                              style="width: 100%;">
                                      </div>
                                      <div class="col-lg-6 pt-1 spacing-right">
                                          Car Picture  <br>  <input class="input_field" name="photo" id="inpFile29" type="file" placeholder="..." style="width: 100%;">
                                          <div class="col-lg-5 spacing-right">
                                            <!--Image Preview Biometric-->
                                            <div class="image-preview29" id="imagePreview29">
                                            <img src="" alt="Image Preview29" class="image-preview__image29" style="height: 100%; width:100%; margin-left:-15px;">
                                            <span class="image-preview__default-text29"> Image Preview </span>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-6 pt-1 spacing-right">
                                          Car Book Picture  <br>  <input class="input_field" name="photo" id="inpFile30" type="file" placeholder="..." style="width: 100%;">
                                          <div class="col-lg-5 spacing-right">
                                            <!--Image Preview Biometric-->
                                            <div class="image-preview30" id="imagePreview30">
                                            <img src="" alt="Image Preview30" class="image-preview__image30" style="height: 100%; width:100%; margin-left:-15px;">
                                            <span class="image-preview__default-text30"> Image Preview </span>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-5  spacing-right">
                                          Payment Type <br> <input class="input_field"
                                              id="head_office_email" name="head_office_email[]"
                                              type="text" placeholder="..."
                                              style="width: 100%;">
                                      </div>
                                  </div>

                              </div>

                              <div class="col-lg-6 spacing-left">
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          Insurrance Company Details <br> <input class="input_field"
                                              id="inpFile1"
                                              name="head_office_cell_no[]" type="file"
                                              placeholder="..." style="width: 100%;">
                                              <div class="col-lg-5" style="margin-left:-14px;">
                                                  <!--Image Preview Biometric-->
                                                  <div class="image-preview1" id="imagePreview1">
                                                  <img src="" alt="Image Preview1" class="image-preview__image1" style="height: 100%; width:100%;">
                                                  <span class="image-preview__default-text1"> Image Preview </span>
                                                  </div>
                                              </div>
                                      </div>
                                      <div class="col-lg-5 spacing-left">
                                          Tracker Company Details <br> <input class="input_field"
                                          id="inpFile42"
                                          name="head_office_cell_no[]" type="file"
                                          placeholder="..." style="width: 100%;">
                                          <div class="col-lg-5" style="margin-left:-14px;">
                                                  <!--Image Preview Biometric-->
                                                  <div class="image-preview412" id="imagePreview42">
                                                  <img src="" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%;">
                                                  <span class="image-preview__default-text42"> Image Preview </span>
                                                  </div>
                                              </div>
                                      </div>
                                  </div>
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          Name <br> <input class="input_field"
                                              id="head_office_cell_no"
                                              name="head_office_cell_no[]" type="text"
                                              placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5 spacing-left">
                                          Cell <br> <input class="input_field"
                                          id="head_office_cell_no"
                                          name="head_office_cell_no[]" type="text"
                                          placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          Email <br> <input class="input_field"
                                              id="head_office_cell_no"
                                              name="head_office_cell_no[]" type="text"
                                              placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5 spacing-left">
                                          Issued On <br> <input class="input_field"
                                          id="head_office_cell_no"
                                          name="head_office_cell_no[]" type="text"
                                          placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <nav>
                                <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab"
                                        data-toggle="tab" href="#vehicle" role="tab"
                                        aria-controls="nav-home" aria-selected="true">Vehicle
                                        Details</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab"
                                        data-toggle="tab" href="#insurrance" role="tab"
                                        aria-controls="nav-profile"
                                        aria-selected="false">Insurrance Company
                                        Details</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab"
                                        data-toggle="tab" href="#tracker" role="tab"
                                        aria-controls="nav-contact"
                                        aria-selected="false">Tracker
                                        Details

                                        </a>
                                    <a class="nav-item nav-link" id="nav-contact-tab"
                                        data-toggle="tab" href="#repair" role="tab"
                                        aria-controls="nav-contact" aria-selected="false">Repair
                                        and Maintenance</a>

                                        <a class="nav-item nav-link" id="nav-contact-tab"
                                        data-toggle="tab" href="#move" role="tab"
                                        aria-controls="nav-contact" aria-selected="false">Usage/
                                        Movement</a>
                                </div>
                            </nav>

                            <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                                <div class="tab-pane fade active" style="opacity: 90%;"  id="vehicle" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Vehicle Name. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Engine No. <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Chasis No. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Vehicle Color <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Vehicle Model <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Token Details</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Amount Paid <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                  <h6> Type of Payment : </h5>
                                                  <div class=" mb-2 d-flex align-items-center">
                                                      <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="cheque">
                                                        <label class="form-check-label" for="inlineCheckbox1">Cheque</label>
                                                      </div>
                                                      <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="cash">
                                                        <label class="form-check-label" for="inlineCheckbox2">Cash</label>
                                                      </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Instrument No. <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Voucher No. <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Payment Date <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Next Token Payment Date <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="alert" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3" style="
                                                margin-bottom: 40px;
                                                width: 25%;">
                                                    <button type="button" class="add-more-btn" onclick=""> + new Token </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade m-3" style="opacity: 90%;"  id="insurrance" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                          <h5>POC :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Comany Name. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Name. <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Web. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Email <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Cell No <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Address :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Floor No <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Building <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Block <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Area <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    City <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Value of Sum Insured. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Insurrance Policy Attachment. <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Certificate of Insurrance. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Notes <br> <textarea class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3" style="
                                                margin-top: 30px;
                                                width: 25%;">
                                                    <button type="button" class="add-more-btn" onclick=""> + new insurrance company</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade m-3" style="opacity: 90%;"  id="tracker" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                            <h5>POC :</h5>
                                                <div class="col-lg-6 spacing-right">
                                                    Comany Name. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Name. <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Web. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Email <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Cell No <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Address :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Floor No <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Building <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Block <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Area <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    City <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Notes <br> <textarea class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade m-3" style="opacity: 90%;"  id="repair" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="col-lg-3" style="
                                  margin-bottom: 40px;
                                  width: 25%;">
                                    <button type="button" class="add-more-btn" onclick=""> + new repair and Maintanence</button>
                                </div>
                                <table class="mt-3 mb-5">
                                    <thead>
                                    <tr class="table table-success table-striped-columns">
                                        <th scope="">Serial No.</th>
                                        <th scope="">Description</th>
                                        <th scope="">Amount of Bill.</th>
                                        <th scope="">Payment Made By.</th>
                                        <th scope="">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-bordered table-striped-columns" >
                                        <th scope="">//</th>
                                        <th scope="">//</th>
                                        <th scope="">//</th>
                                        <th scope="">//</th>
                                        <th scope="">//</th>
                                        </tr>
                                    </tbody>
                                </table>
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <h5>Vendor Details :</h5>
                                                <div class="col-lg-6 spacing-right">
                                                    Comany Name. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    POC Name. <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Web. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Email <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Cell No <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Address :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Floor No <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Building <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Block <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Area <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    City <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Notes <br> <textarea class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;"></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Any Warranty :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Notes <br> <textarea class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade m-3" style="opacity: 90%;"  id="move" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="col-lg-3" style="
                                  margin-bottom: 40px;
                                  width: 25%;">
                                    <button type="button" class="add-more-btn" onclick=""> + new useage/movement</button>
                                </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            <h5>VEHICLE LOG BOOK</h5>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Vehicle No.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Average Per Liter: <br>  <input class="input_field" type="text" name="insp_name" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <table class="mt-3 mb-5">
                                        <thead>
                                        <tr class="table table-success table-striped-columns">
                                            <th scope="">Date</th>
                                            <th scope="">Time From</th>
                                            <th scope="">Time To</th>
                                            <th scope="">Details of Journey</th>
                                            <th scope="">Purpose of Journey</th>
                                            <th scope="">Name of Officer</th>
                                            <th scope="">Meter Reading to</th>
                                            <th scope="">Meter Reading From</th>
                                            <th scope="">Distance Covered</th>
                                            <th scope="">Signature</th>
                                            <th scope="">P.O.L Drawn</th>
                                            <th scope="">Remarks</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-bordered table-striped-columns" >
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                            </div>
                          </div>
                          <div class="bike" style="display:none;">
                            <div class=" row main-content div">
                              <div class="col-lg-6">
                                  <div class="row mb-2">
                                      <div class="col-lg-6 spacing-right">
                                          Bike No. <br> <input class="input_field"
                                              id="head_office_name" name="head_office_name[]"
                                              type="text" placeholder="..."
                                              style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5 spacing-left spacing-right">
                                          Bike Model <br> <input class="input_field"
                                              id="head_office_email" name="head_office_email[]"
                                              type="text" placeholder="..."
                                              style="width: 100%;">
                                      </div>
                                      <div class="col-lg-6 pt-1 spacing-right">
                                          Bike Picture  <br>  <input class="input_field" name="photo" id="inpFile29" type="file" placeholder="..." style="width: 100%;">
                                          <div class="col-lg-5 spacing-right">
                                            <!--Image Preview Biometric-->
                                            <div class="image-preview29" id="imagePreview29">
                                            <img src="" alt="Image Preview29" class="image-preview__image29" style="height: 100%; width:100%; margin-left:-15px;">
                                            <span class="image-preview__default-text29"> Image Preview </span>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-6 pt-1 spacing-right">
                                          Bike Book Picture  <br>  <input class="input_field" name="photo" id="inpFile30" type="file" placeholder="..." style="width: 100%;">
                                          <div class="col-lg-5 spacing-right">
                                            <!--Image Preview Biometric-->
                                            <div class="image-preview30" id="imagePreview30">
                                            <img src="" alt="Image Preview30" class="image-preview__image30" style="height: 100%; width:100%; margin-left:-15px;">
                                            <span class="image-preview__default-text30"> Image Preview </span>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="col-lg-5  spacing-right">
                                          Payment Type <br> <input class="input_field"
                                              id="head_office_email" name="head_office_email[]"
                                              type="text" placeholder="..."
                                              style="width: 100%;">
                                      </div>
                                  </div>

                              </div>

                              <div class="col-lg-6 spacing-left">
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          Insurrance Company Details <br> <input class="input_field"
                                              id="inpFile1"
                                              name="head_office_cell_no[]" type="file"
                                              placeholder="..." style="width: 100%;">
                                              <div class="col-lg-5" style="margin-left:-14px;">
                                                  <!--Image Preview Biometric-->
                                                  <div class="image-preview1" id="imagePreview1">
                                                  <img src="" alt="Image Preview1" class="image-preview__image1" style="height: 100%; width:100%;">
                                                  <span class="image-preview__default-text1"> Image Preview </span>
                                                  </div>
                                              </div>
                                      </div>
                                      <div class="col-lg-5 spacing-left">
                                          Tracker Company Details <br> <input class="input_field"
                                          id="inpFile42"
                                          name="head_office_cell_no[]" type="file"
                                          placeholder="..." style="width: 100%;">
                                          <div class="col-lg-5" style="margin-left:-14px;">
                                                  <!--Image Preview Biometric-->
                                                  <div class="image-preview412" id="imagePreview42">
                                                  <img src="" alt="Image Preview42" class="image-preview__image42" style="height: 100%; width:100%;">
                                                  <span class="image-preview__default-text42"> Image Preview </span>
                                                  </div>
                                              </div>
                                      </div>
                                  </div>
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          Name <br> <input class="input_field"
                                              id="head_office_cell_no"
                                              name="head_office_cell_no[]" type="text"
                                              placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5 spacing-left">
                                          Cell <br> <input class="input_field"
                                          id="head_office_cell_no"
                                          name="head_office_cell_no[]" type="text"
                                          placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                                  <div class="row mb-2">
                                      <div class="col-lg-5 spacing-right">
                                          Email <br> <input class="input_field"
                                              id="head_office_cell_no"
                                              name="head_office_cell_no[]" type="text"
                                              placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-5 spacing-left">
                                          Issued On <br> <input class="input_field"
                                          id="head_office_cell_no"
                                          name="head_office_cell_no[]" type="text"
                                          placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <nav>
                                <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab"
                                        data-toggle="tab" href="#bike_vehicle" role="tab"
                                        aria-controls="nav-home" aria-selected="true">Vehicle
                                        Details</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab"
                                        data-toggle="tab" href="#bike_insurrance" role="tab"
                                        aria-controls="nav-profile"
                                        aria-selected="false">Insurrance Company
                                        Details</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab"
                                        data-toggle="tab" href="#bike_tracker" role="tab"
                                        aria-controls="nav-contact"
                                        aria-selected="false">Tracker
                                        Details

                                        </a>
                                    <a class="nav-item nav-link" id="nav-contact-tab"
                                        data-toggle="tab" href="#bike_repair" role="tab"
                                        aria-controls="nav-contact" aria-selected="false">Repair
                                        and Maintenance</a>

                                        <a class="nav-item nav-link" id="nav-contact-tab"
                                        data-toggle="tab" href="#bike_move" role="tab"
                                        aria-controls="nav-contact" aria-selected="false">Usage/
                                        Movement</a>
                                </div>
                            </nav>

                            <div class="tab-content" style="font-size: small; font-weight: 600;" id="nav-tabContent">
                                <div class="tab-pane fade active" style="opacity: 90%;"  id="bike_vehicle" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Vehicle Name. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Engine No. <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Chasis No. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Vehicle Color <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Vehicle Model <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Token Details</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Amount Paid <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-right">
                                                  <h6> Type of Payment : </h5>
                                                  <div class=" mb-2 d-flex align-items-center">
                                                      <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="cheque">
                                                        <label class="form-check-label" for="inlineCheckbox1">Cheque</label>
                                                      </div>
                                                      <div class="form-check form-check-inline spacing-left">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="cash">
                                                        <label class="form-check-label" for="inlineCheckbox2">Cash</label>
                                                      </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Instrument No. <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Voucher No. <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Payment Date <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Next Token Payment Date <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="alert" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3" style="
                                                margin-bottom: 40px;
                                                width: 25%;">
                                                    <button type="button" class="add-more-btn" onclick=""> + new Token </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade m-3" style="opacity: 90%;"  id="bike_insurrance" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                          <h5>POC :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Comany Name. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Name. <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Web. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Email <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Cell No <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Address :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Floor No <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Building <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Block <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Area <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    City <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-6 spacing-right">
                                                    Value of Sum Insured. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Insurrance Policy Attachment. <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Certificate of Insurrance. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Notes <br> <textarea class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-3" style="
                                                margin-top: 30px;
                                                width: 25%;">
                                                    <button type="button" class="add-more-btn" onclick=""> + new insurrance company</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade m-3" style="opacity: 90%;"  id="bike_tracker" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                            <h5>POC :</h5>
                                                <div class="col-lg-6 spacing-right">
                                                    Comany Name. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Name. <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Web. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Email <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Cell No <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Address :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Floor No <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Building <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Block <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Area <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    City <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Notes <br> <textarea class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade m-3" style="opacity: 90%;"  id="bike_repair" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="col-lg-3" style="
                                  margin-bottom: 40px;
                                  width: 25%;">
                                    <button type="button" class="add-more-btn" onclick=""> + new repair and Maintanence</button>
                                </div>
                                <table class="mt-3 mb-5">
                                    <thead>
                                    <tr class="table table-success table-striped-columns">
                                        <th scope="">Serial No.</th>
                                        <th scope="">Description</th>
                                        <th scope="">Amount of Bill.</th>
                                        <th scope="">Payment Made By.</th>
                                        <th scope="">Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-bordered table-striped-columns" >
                                        <th scope="">//</th>
                                        <th scope="">//</th>
                                        <th scope="">//</th>
                                        <th scope="">//</th>
                                        <th scope="">//</th>
                                        </tr>
                                    </tbody>
                                </table>
                                    <div class=" row main-content div">
                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <h5>Vendor Details :</h5>
                                                <div class="col-lg-6 spacing-right">
                                                    Comany Name. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    POC Name. <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-6 spacing-right">
                                                    Web. <br> <input class="input_field"
                                                        id="head_office_name" name="head_office_name[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Email <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Cell No <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Address :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Office No <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Floor No <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Building <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Block <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Area <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    City <br> <input class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-left spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="file" placeholder="..."
                                                        style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5  spacing-right">
                                                    Notes <br> <textarea class="input_field"
                                                        id="head_office_email" name="head_office_email[]"
                                                        type="text" placeholder="..."
                                                        style="width: 100%;"></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 spacing-left">
                                            <h5>Any Warranty :</h5>
                                            <div class="row mb-2">
                                                <div class="col-lg-5 spacing-right">
                                                    Attachments <br> <input class="input_field"
                                                        id="head_office_cell_no"
                                                        name="head_office_cell_no[]" type="text"
                                                        placeholder="..." style="width: 100%;">
                                                </div>
                                                <div class="col-lg-5 spacing-left">
                                                    Notes <br> <textarea class="input_field"
                                                    id="head_office_cell_no"
                                                    name="head_office_cell_no[]" type="text"
                                                    placeholder="..." style="width: 100%;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade m-3" style="opacity: 90%;"  id="bike_move" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="col-lg-3" style="
                                  margin-bottom: 40px;
                                  width: 25%;">
                                    <button type="button" class="add-more-btn" onclick=""> + new useage/movement</button>
                                </div>
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right">
                                            <h5>VEHICLE LOG BOOK</h5>
                                        </div>
                                        <div class="col-lg-4 spacing-right">
                                            Vehicle No.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-4 spacing-left spacing-right">
                                            Average Per Liter: <br>  <input class="input_field" type="text" name="insp_name" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                    <table class="mt-3 mb-5">
                                        <thead>
                                        <tr class="table table-success table-striped-columns">
                                            <th scope="">Date</th>
                                            <th scope="">Time From</th>
                                            <th scope="">Time To</th>
                                            <th scope="">Details of Journey</th>
                                            <th scope="">Purpose of Journey</th>
                                            <th scope="">Name of Officer</th>
                                            <th scope="">Meter Reading to</th>
                                            <th scope="">Meter Reading From</th>
                                            <th scope="">Distance Covered</th>
                                            <th scope="">Signature</th>
                                            <th scope="">P.O.L Drawn</th>
                                            <th scope="">Remarks</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-bordered table-striped-columns" >
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            <th scope="">//</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                            </div>
                          </div>
                      </div>
                      <!--list-of-site-ids-->
                      <div class="tab-pane fade" id="nav-list_of_site_ids" role="tabpanel"
                        aria-labelledby="nav-list_of_site_ids-tab">
                        <div class="col-lg-12 mb-3">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="customer_name" class="control-label mb-0">Customer Name</label>
                              <input id="customer_name" value="" name="customer_name" type="text" class="input-field"
                                aria-required="true" aria-invalid="false" style="width: 85%;">
                            </div>
                            <div class="col-md-4">
                              <label for="parent_customer_id" class="control-label mb-0">Parent Customer</label>
                              <select id="parent_customer_id" name="parent_customer_id" class="input-field" required=""
                                style="width: 100%;">
                                <option value="0">Select Categories</option>
                                <option value="1">
                                  Customer1
                                </option>
                                <option value="2">
                                  Customer2
                                </option>
                                <option value="4">
                                  Customer3
                                </option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--Notifications-->
                      <div class="tab-pane fade" id="notification" role="tabpanel"
                        aria-labelledby="nav-list_of_site_ids-tab">
                        <div class="col-lg-12 spacing-right">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Notification No.  <br>  <input class="input_field" type="text" name="insp_date" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class=" col-lg-4 mb-2 d-flex align-items-center">
                                        <label>Notification Related To :</label>
                                        <div class="form-check form-check-inline spacing-left">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="negative">
                                          <label class="form-check-label" for="inlineCheckbox1">Tax</label>
                                        </div>
                                        <div class="form-check form-check-inline spacing-left">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="positives">
                                          <label class="form-check-label" for="inlineCheckbox2">Threat Alert</label>
                                        </div>
                                        <div id="new-checkboxes"></div>
                                          <div id="new-checkboxes">
                                              <div class="form-check form-check-inline">
                                                  <input class="form-check-input" name="compliances[]" type="checkbox" id="addMoreCheckbox">
                                                  <label class="form-check-label" for="addMoreCheckbox">Add More</label>
                                              </div>
                                          </div>
                                  </div>
                                      <div class="col-lg-3">
                                        Notes. <br>  <textarea class="input_field" type="file" name="caste" placeholder="..." style="width: 100%;"></textarea>
                                     </div>
                                    <div class="col-lg-4 spacing-left">
                                        Attachment. <br>  <input class="input_field" type="file" name="caste" placeholder="..." style="width: 100%;">
                                     </div>

                                     <div class="col-lg-3" style="
                                        margin-top: 30px;
                                        width: 25%;">
                                            <button type="button" class="add-more-btn" onclick=""> + new notification </button>
                                      </div>
                                </div>
                                <div class="row">
                                    <h5>Notification To :</h5>
                                    <div class=" col-lg-4 mb-2 d-flex align-items-center">
                                        <label>Notification shared with :</label>
                                        <div class="form-check form-check-inline spacing-left">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="negative">
                                          <label class="form-check-label" for="inlineCheckbox1">Staff</label>
                                        </div>
                                        <div class="form-check form-check-inline spacing-left">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="positives">
                                          <label class="form-check-label" for="inlineCheckbox2">Customer</label>
                                        </div>
                                        <div id="new-checkbox"></div>
                                          <div id="new-checkbox">
                                              <div class="form-check form-check-inline"  style="width:90px;">
                                                  <input class="form-check-input" name="compliances[]" type="checkbox" id="addMoreCheckbox1">
                                                  <label class="form-check-label" for="addMoreCheckbox">Add More</label>
                                              </div>
                                          </div>
                                  </div>
                                </div>

                        </div>
                    </div>
                  </div>

                  <div class="row col-lg-12 d-flex justify-content-center" style="margin-bottom: 4px;">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="submit" class="btn btn-secondary" style="margin-left: 5px;">Submit</button>
                  </div>

                </form>
              </section>

            </div>


              <script>
                const maintenanceCheckbox = document.getElementById('maintenanceCheckbox');
                const maintenanceDiv = document.querySelector('.maintenance');

                maintenanceCheckbox.addEventListener('change', () => {
                    if (maintenanceCheckbox.checked) {
                        maintenanceDiv.style.display = 'block';
                    } else {
                        maintenanceDiv.style.display = 'none';
                    }
                });
              </script>

              <script>
                  function showPopup(icon) {
                      const popup = icon.nextElementSibling;
                      popup.style.display = "block";
                  }

                  function hidePopup(button) {
                      const popup = button.parentNode;
                      popup.style.display = "none";
                  }
              </script>

            <script>
              document.getElementById("submit-category").addEventListener("click", function() {
              var customCategory = document.getElementById("custom-category").value;
              var select = document.getElementById("category");
              var option = document.createElement("option");
              option.text = customCategory;
              option.value = customCategory;
              select.add(option);
              });
            </script>

            <script>
              var carRadio = document.getElementById('carcheck');
              var bikeRadio = document.getElementById('bikecheck');
              var carDiv = document.querySelector('.car');
              var bikeDiv = document.querySelector('.bike');

              carRadio.addEventListener('change', function() {
                if (this.checked) {
                  carDiv.style.display = 'block';
                  bikeDiv.style.display = 'none';
                }
              });

              bikeRadio.addEventListener('change', function() {
                if (this.checked) {
                  bikeDiv.style.display = 'block';
                  carDiv.style.display = 'none';
                }
              });
            </script>

            <script>
              var checkbox1 = document.getElementById('bikecheck');
              var bikeDiv = document.querySelector('.bike');

              checkbox1.addEventListener('change', function() {
                if (this.checked) {
                  bikeDiv.style.display = 'block';
                } else {
                  bikeDiv.style.display = 'none';
                }
              });
            </script>

            <script>
              var room5 = 0; // Initialize room5 variable

              function audits_add_more() {
                room5++;
                var objTo = document.getElementById('audits_add_more');
                var divtest = document.createElement("div");
                divtest.setAttribute("class", "fifth-col removeclass" + room5);
                var rdiv = 'removeclass' + room5;
                divtest.innerHTML =
                  '   <div class="row mb-2"><div class="col-lg-4 spacing-right">Inventory Code <br><input class="input_field" id="head_office_name" name="audit_file[]" type="text" placeholder="..." style="width: 100%;"></div><div class="col-lg-4">Attachments <br><input class="input_field" id="head_office_name" name="audit_date[]" type="file" placeholder="..." style="width: 100%;"></div><div class="col-lg-4 spacing-left spacing-right">Notes <br><textarea class="input_field" id="head_office_email" name="audit_sign[]" type="text" placeholder="..." style="width: 100%;"></textarea></div></div><div class="col-lg-2 spacing-left my-5"><button type="button" class="remove-btn" onclick="education_remove_fields(' +
                  room5 + ')">Remove</button></div>';
                objTo.appendChild(divtest);
              }
            </script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                function toggleHiddenDiv() {
                    var hiddenDiv = document.getElementById('hidden-div');
                    if (hiddenDiv.style.display === 'none') {
                        hiddenDiv.style.display = 'block';
                    } else {
                        hiddenDiv.style.display = 'none';
                    }
                }
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(document).ready(function() {
                    var index = 0;

                    $('#addMoreCheckbox').on('click', function() {
                        index++;
                        var inputHtml = '<input type="text" class="form-control currencyName" placeholder="New ' + index + '">';
                        var checkboxHtml = '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' + (index+5) + '">' + inputHtml + '</div>';
                        $('#new-checkboxes').append(checkboxHtml);

                        // Update the newly added input field to create a corresponding label for the checkbox
                        $('.currencyName').last().on('blur', function() {
                        var checkboxId = $(this).siblings('input[type="checkbox"]').attr('id');
                        var labelHtml = '<label class="form-check-label" for="' + checkboxId + '">' + $(this).val() + '</label>';
                        $(this).siblings('input[type="checkbox"]').after(labelHtml);
                        $(this).hide(); // Hide the input field after the label is created
                        });
                    });
                });
            </script>

            <!--Image Preview Basic Info-->
            <script>
                const inpFile = document.getElementById("inpFile");
                const previewContainer = document.getElementById("imagePreview");
                const previewImage = previewContainer.querySelector(".image-preview__image");
                const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

                inpFile.addEventListener("change", function() {
                    const file = this.files[0];

                    if (file) {
                        const reader = new FileReader();

                        previewDefaultText.style.display = "none";
                        previewImage.style.display = "block";

                        reader.addEventListener("load", function() {
                            previewImage.setAttribute("src", this.result);
                        });

                        reader.readAsDataURL(file);
                    } else {
                        previewDefaultText.style.display = "null";
                        previewImage.style.display = "null";
                        previewImage.setAttribute("src", "");
                    }


                });
            </script>

            <script>
                const inpFile4 = document.getElementById("inpFile4");
                const previewContainer4 = document.getElementById("imagePreview4");
                const previewImage4 = previewContainer4.querySelector(".image-preview__image4");
                const previewDefaultText4 = previewContainer4.querySelector(".image-preview__default-text4");

                inpFile4.addEventListener("change", function() {
                    const file = this.files[0];

                    if (file) {
                        const reader = new FileReader();

                        previewDefaultText4.style.display = "none";
                        previewImage4.style.display = "block";

                        reader.addEventListener("load", function() {
                            previewImage4.setAttribute("src", this.result);
                        });

                        reader.readAsDataURL(file);
                    } else {
                        previewDefaultText4.style.display = "null";
                        previewImage4.style.display = "null";
                        previewImage4.setAttribute("src", "");
                    }


                });
            </script>

            <script>
                $(document).ready(function() {
                    var index = 0;

                    $('#addMoreCheckbox1').on('click', function() {
                        index++;
                        var inputHtml = '<input type="text" class="form-control currencyName" placeholder="New ' + index + '">';
                        var checkboxHtml = '<div class="form-check form-check-inline"><input class="form-check-input" name="compliances[]" type="checkbox" id="inlineCheckbox' + (index+5) + '">' + inputHtml + '</div>';
                        $('#new-checkbox').append(checkboxHtml);

                        // Update the newly added input field to create a corresponding label for the checkbox
                        $('.currencyName').last().on('blur', function() {
                        var checkboxId = $(this).siblings('input[type="checkbox"]').attr('id');
                        var labelHtml = '<label class="form-check-label" for="' + checkboxId + '">' + $(this).val() + '</label>';
                        $(this).siblings('input[type="checkbox"]').after(labelHtml);
                        $(this).hide(); // Hide the input field after the label is created
                        });
                    });
                });
            </script>

            <script>
              const checkbox = document.getElementById('deploy_uni');
              const uniformField = document.getElementById('uniform-field');

              checkbox.addEventListener('change', (event) => {
                  if (event.target.checked) {
                    uniformField.style.display = 'block';
                  } else {
                    uniformField.style.display = 'none';
                  }
              });
            </script>

            <script>
              document.addEventListener('DOMContentLoaded', function() {
                const checkbox1 = document.getElementById('recover_uni');
                const uniformRecover = document.getElementById('uniform-recover');

                checkbox1.addEventListener('change', (event) => {
                    if (event.target.checked) {
                      uniformRecover.style.display = 'block';
                    } else {
                      uniformRecover.style.display = 'none';
                    }
                });
              });
            </script>


            <script>
              const checkbox2 = document.getElementById('deploy-weapon');
              const deployWeapon = document.getElementById('deploy-weapon-field');

              checkbox2.addEventListener('change', (event) => {
                  if (event.target.checked) {
                    deployWeapon.style.display = 'block';
                  } else {
                    deployWeapon.style.display = 'none';
                  }
              });
            </script>

            <script>
              const checkbox3 = document.getElementById('recover-weapon');
              const recoverWeapon = document.getElementById('recover-weapon-field');

              checkbox3.addEventListener('change', (event) => {
                  if (event.target.checked) {
                    recoverWeapon.style.display = 'block';
                  } else {
                    recoverWeapon.style.display = 'none';
                  }
              });
            </script>

            <script>
              const checkbox4 = document.getElementById('prop_care');
              const propField = document.getElementById('prop-field');

              checkbox4.addEventListener('change', (event) => {
                  if (event.target.checked) {
                    propField.style.display = 'block';
                  } else {
                    propField.style.display = 'none';
                  }
              });
            </script>

            <script>
              const checkbox5 = document.getElementById('plaza_m');
              const plazaField = document.getElementById('plaza-field');

              checkbox5.addEventListener('change', (event) => {
                  if (event.target.checked) {
                    plazaField.style.display = 'block';
                  } else {
                    plazaField.style.display = 'none';
                  }
              });
            </script>

            <script>
              const checkbox6 = document.getElementById('incharge_m');
              const inchargeField = document.getElementById('incharge-field');

              checkbox6.addEventListener('change', (event) => {
                  if (event.target.checked) {
                    inchargeField.style.display = 'block';
                  } else {
                    inchargeField.style.display = 'none';
                  }
              });
            </script>

            <script>
              const checkbox6 = document.getElementById('prop_owner');
              const ownerField = document.getElementById('prop-owf');

              checkbox6.addEventListener('change', (event) => {
                  if (event.target.checked) {
                    ownerField.style.display = 'block';
                  } else {
                    ownerField.style.display = 'none';
                  }
              });
            </script>

            <script>
              const checkbox7 = document.getElementById('prop_ntn');
              const ntnField = document.getElementById('ntn-fields');

              checkbox7.addEventListener('change', (event) => {
                  if (event.target.checked) {
                    ntnField.style.display = 'block';
                  } else {
                    ntnField.style.display = 'none';
                  }
              });
            </script>

            <script>
              const checkbox8 = document.getElementById('kote_incharge');
              const koteField = document.getElementById('kote-field');

              checkbox8.addEventListener('change', (event) => {
                  if (event.target.checked) {
                    koteField.style.display = 'block';
                  } else {
                    koteField.style.display = 'none';
                  }
              });
            </script>

            <script>
              const checkbox9 = document.getElementById('armorer');
              const armField = document.getElementById('armorer-field');

              checkbox9.addEventListener('change', (event) => {
                  if (event.target.checked) {
                    armField.style.display = 'block';
                  } else {
                    armField.style.display = 'none';
                  }
              });
            </script>

            <script>
              const lastCopyCheckbox = document.getElementById('last_copy_checkbox');
              const attachmentsDiv = document.getElementById('attachments_div');

              lastCopyCheckbox.addEventListener('change', (event) => {
                  if (event.target.checked) {
                      attachmentsDiv.style.display = 'block';
                  } else {
                      attachmentsDiv.style.display = 'none';
                  }
              });
          </script>

          <script>
            function addMoreFields() {
            var container = document.getElementById('inventory-container');

            // Create a new div to hold the fields
            var newDiv = document.createElement('div');
            newDiv.className = 'row mb-2';

            // Create the item code field
            var itemCodeField = document.createElement('div');
            itemCodeField.className = 'col-lg-5 spacing-left spacing-right';
            itemCodeField.innerHTML = 'Item Code <br> <input class="input_field" name="item_code[]" type="text" placeholder="..." style="width: 100%;">';

            // Create the attachments field
            var attachmentsField = document.createElement('div');
            attachmentsField.className = 'col-lg-5 spacing-left spacing-right';
            attachmentsField.innerHTML = 'Attachments <br> <input class="input_field" name="attachments[]" type="file" placeholder="..." style="width: 100%;">';

            // Create the notes field
            var notesField = document.createElement('div');
            notesField.className = 'col-lg-5 spacing-left spacing-right';
            notesField.innerHTML = 'Notes <br> <textarea class="input_field" name="notes[]" type="file" placeholder="..." style="width: 100%;"></textarea>';

            // Create the remove button
            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.innerText = 'Remove';
            removeButton.style.width = '80px';
            removeButton.style.height = '30px';
            removeButton.style.marginTop = '36px';
            removeButton.style.marginLeft = '7px'
            removeButton.addEventListener('click', function() {
              container.removeChild(newDiv);
            });

            // Append the fields and remove button to the new div
            newDiv.appendChild(itemCodeField);
            newDiv.appendChild(attachmentsField);
            newDiv.appendChild(notesField);
            newDiv.appendChild(removeButton);


            // Append the new div to the container
            container.appendChild(newDiv);
          }
          </script>

          <script>
            function addMoreHygieneFields() {
            var container = document.getElementById('hygiene-container');

            // Create a new div to hold the fields
            var newDiv = document.createElement('div');
            newDiv.className = 'row mb-2';

            // Create the attachments field
            var attachmentsField = document.createElement('div');
            attachmentsField.className = 'col-lg-5 spacing-left spacing-right';
            attachmentsField.innerHTML = 'Attachments <br> <input class="input_field" name="attachments[]" type="file" placeholder="..." style="width: 100%;">';

            // Create the notes field
            var notesField = document.createElement('div');
            notesField.className = 'col-lg-5 spacing-left spacing-right';
            notesField.innerHTML = 'Notes <br> <textarea class="input_field" name="notes[]" type="file" placeholder="..." style="width: 100%;"></textarea>';

            // Create the remove button
            var removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.innerText = 'Remove';
            removeButton.style.width = '80px';
            removeButton.style.height = '30px';
            removeButton.style.marginTop = '36px';
            removeButton.style.marginLeft = '7px'
            removeButton.className = 'remove-button';

            removeButton.addEventListener('click', function() {
              container.removeChild(newDiv);
            });

            // Append the fields and remove button to the new div
            newDiv.appendChild(attachmentsField);
            newDiv.appendChild(notesField);
            newDiv.appendChild(removeButton);

            // Append the new div to the container
            container.appendChild(newDiv);
          }
          </script>

          <script>
            function addMoreRentalFields() {
              var container = document.getElementById('rental-container');

              // Create a new div to hold the fields
              var newDiv = document.createElement('div');
              newDiv.className = 'row mb-2';

              // Create the rental amount field
              var rentalAmountField = document.createElement('div');
              rentalAmountField.className = 'col-lg-4 spacing-right';
              rentalAmountField.innerHTML = 'Rental Amount. <br> <input class="input_field" type="text" name="rental_amount[]" placeholder="..." style="width: 100%;">';

              // Create the agreement execution date field
              var agreementExecutionDateField = document.createElement('div');
              agreementExecutionDateField.className = 'col-lg-4 spacing-left spacing-right';
              agreementExecutionDateField.innerHTML = 'Agreement Execution Date: <br> <input class="input_field" type="date" name="agreement_execution_date[]" placeholder="" style="width: 100%;">';

              // Create the agreement end date field
              var agreementEndDateField = document.createElement('div');
              agreementEndDateField.className = 'col-lg-3 spacing-left';
              agreementEndDateField.innerHTML = 'Agreement End date: <br> <input class="input_field" type="date" name="agreement_end_date[]" placeholder="..." style="width: 100%;">';

              // Create the agreement attachment field
              var agreementAttachmentField = document.createElement('div');
              agreementAttachmentField.className = 'col-lg-3 spacing-right';
              agreementAttachmentField.innerHTML = 'Agreement Attachment: <br> <input class="input_field" type="file" name="agreement_attachment[]" placeholder="..." style="width: 100%;">';

              // Create the remove button
              var removeButton = document.createElement('button');
              removeButton.type = 'button';
              removeButton.innerText = 'Remove';
              removeButton.style.width = '80px';
              removeButton.style.height = '30px';
              removeButton.style.marginTop = '22px';
              removeButton.className = 'remove-button';

              removeButton.addEventListener('click', function() {
                container.removeChild(newDiv);
              });

              // Append the fields and remove button to the new div
              newDiv.appendChild(rentalAmountField);
              newDiv.appendChild(agreementExecutionDateField);
              newDiv.appendChild(agreementEndDateField);
              newDiv.appendChild(agreementAttachmentField);
              newDiv.appendChild(removeButton);

              // Append the new div to the container
              container.appendChild(newDiv);
            }
          </script>

          <script>
            function addMoreStaff() {
              var container = document.getElementById('staff-details-container');

              // Create a new row to hold the staff details fields
              var newRow = document.createElement('div');
              newRow.className = 'row';

              // Create the staff details fields
              var nameField = document.createElement('div');
              nameField.className = 'col-lg-4 spacing-right';
              nameField.innerHTML = 'Name. <br> <input class="input_field" type="text" name="staff_name[]" placeholder="..." style="width: 100%;">';

              var employeeNoField = document.createElement('div');
              employeeNoField.className = 'col-lg-4 spacing-left spacing-right';
              employeeNoField.innerHTML = 'Employee No: <br> <input class="input_field" type="text" name="employee_no[]" placeholder="" style="width: 100%;">';

              var designationField = document.createElement('div');
              designationField.className = 'col-lg-3 spacing-left';
              designationField.innerHTML = 'Designation. <br> <input class="input_field" type="text" name="designation[]" placeholder="..." style="width: 100%;">';

              var officeNoField = document.createElement('div');
              officeNoField.className = 'col-lg-4 spacing-right mb-3';
              officeNoField.innerHTML = 'Office No. <br> <input class="input_field basic-info-attachements" type="text" name="office_no[]" placeholder="..." style="width: 100%;">';

              var emailField = document.createElement('div');
              emailField.className = 'col-lg-3 spacing-left';
              emailField.innerHTML = 'Email <br> <input class="input_field basic-info-attachements" type="text" name="email[]" placeholder="..." style="width: 100%;">';

              var removeButtonField = document.createElement('div');
              removeButtonField.className = 'col-lg-1';
              removeButtonField.innerHTML = '<button type="button" class="remove-btn" onclick="removeStaff(this)" style="margin-left: -5px; margin-top: 19px;">Remove</button>';

              // Append the staff details fields to the new row
              newRow.appendChild(nameField);
              newRow.appendChild(employeeNoField);
              newRow.appendChild(designationField);
              newRow.appendChild(officeNoField);
              newRow.appendChild(emailField);
              newRow.appendChild(removeButtonField);

              // Append the new row to the container
              container.appendChild(newRow);
            }

            function removeStaff(button) {
              var row = button.parentNode.parentNode;
              row.parentNode.removeChild(row);
            }
          </script>

            <script>
              document.getElementById("submit-designation").addEventListener("click", function() {
              var customCategory = document.getElementById("custom-designation").value;
              var select = document.getElementById("catagory");
              var option = document.createElement("option");
              option.text = customCategory;
              option.value = customCategory;
              select.add(option);
              });
            </script>

            <script>
                const inpFile1 = document.getElementById("inpFile1");
                const previewContainer1 = document.getElementById("imagePreview1");
                const previewImage1 = previewContainer1.querySelector(".image-preview__image1");
                const previewDefaultText1 = previewContainer1.querySelector(".image-preview__default-text1");

                inpFile1.addEventListener("change", function(){
                    const file = this.files[0];

                    if(file){
                        const reader = new FileReader();

                        previewDefaultText1.style.display = "none";
                        previewImage1.style.display = "block";

                        reader.addEventListener("load", function(){
                            previewImage1.setAttribute("src", this.result);
                        });

                        reader.readAsDataURL(file);
                    }
                    else{
                        previewDefaultText1.style.display = "null";
                        previewImage1.style.display = "null";
                        previewImage1.setAttribute("src", "");
                    }


                });
            </script>

            <script>
                const inpFile42 = document.getElementById("inpFile42");
                const previewContainer42 = document.getElementById("imagePreview42");
                const previewImage42 = previewContainer42.querySelector(".image-preview__image42");
                const previewDefaultText42 = previewContainer42.querySelector(".image-preview__default-text42");

                inpFile42.addEventListener("change", function(){
                    const file = this.files[0];

                    if(file){
                        const reader = new FileReader();

                        previewDefaultText42.style.display = "none";
                        previewImage42.style.display = "block";

                        reader.addEventListener("load", function(){
                            previewImage42.setAttribute("src", this.result);
                        });

                        reader.readAsDataURL(file);
                    }
                    else{
                        previewDefaultText42.style.display = "null";
                        previewImage42.style.display = "null";
                        previewImage42.setAttribute("src", "");
                    }

                });
            </script>

            <script>
                const inpFile29 = document.getElementById("inpFile29");
                const previewContainer29 = document.getElementById("imagePreview29");
                const previewImage29 = previewContainer29.querySelector(".image-preview__image29");
                const previewDefaultText29 = previewContainer29.querySelector(".image-preview__default-text29");

                inpFile29.addEventListener("change", function(){
                    const file = this.files[0];

                    if(file){
                        const reader = new FileReader();

                        previewDefaultText29.style.display = "none";
                        previewImage29.style.display = "block";

                        reader.addEventListener("load", function(){
                            previewImage29.setAttribute("src", this.result);
                        });

                        reader.readAsDataURL(file);
                    }
                    else{
                        previewDefaultText29.style.display = "null";
                        previewImage29.style.display = "null";
                        previewImage29.setAttribute("src", "");
                    }
                });
            </script>

            <script>
                const inpFile30 = document.getElementById("inpFile30");
                const previewContainer30 = document.getElementById("imagePreview30");
                const previewImage30 = previewContainer30.querySelector(".image-preview__image30");
                const previewDefaultText30 = previewContainer30.querySelector(".image-preview__default-text30");

                inpFile30.addEventListener("change", function(){
                    const file = this.files[0];

                    if(file){
                        const reader = new FileReader();

                        previewDefaultText30.style.display = "none";
                        previewImage30.style.display = "block";

                        reader.addEventListener("load", function(){
                            previewImage30.setAttribute("src", this.result);
                        });

                        reader.readAsDataURL(file);
                    }
                    else{
                        previewDefaultText30.style.display = "null";
                        previewImage30.style.display = "null";
                        previewImage30.setAttribute("src", "");
                    }
                });
            </script>

            <script>
              const inpFile31 = document.getElementById("inpFile31");
              const previewContainer31 = document.getElementById("imagePreview31");
              const previewImage31 = previewContainer31.querySelector(".image-preview__image31");
              const previewDefaultText31 = previewContainer31.querySelector(".image-preview__default-text31");

              inpFile31.addEventListener("change", function(){
                  const file = this.files[0];

                  if(file){
                      const reader = new FileReader();

                      previewDefaultText31.style.display = "none";
                      previewImage31.style.display = "block";

                      reader.addEventListener("load", function(){
                          previewImage31.setAttribute("src", this.result);
                      });

                      reader.readAsDataURL(file);
                  }
                  else{
                      previewDefaultText31.style.display = "null";
                      previewImage31.style.display = "null";
                      previewImage31.setAttribute("src", "");
                  }
              });
            </script>


            <script>
                const inpFile43 = document.getElementById("inpFile43");
                const previewContainer43 = document.getElementById("imagePreview43");
                const previewImage43 = previewContainer43.querySelector(".image-preview__image43");
                const previewDefaultText43 = previewContainer43.querySelector(".image-preview__default-text43");

                inpFile43.addEventListener("change", function(){
                    const file = this.files[0];

                    if(file){
                        const reader = new FileReader();

                        previewDefaultText43.style.display = "none";
                        previewImage43.style.display = "block";

                        reader.addEventListener("load", function(){
                            previewImage43.setAttribute("src", this.result);
                        });

                        reader.readAsDataURL(file);
                    }
                    else{
                        previewDefaultText43.style.display = "null";
                        previewImage43.style.display = "null";
                        previewImage43.setAttribute("src", "");
                    }

                });
            </script>



@include('layouts.footer')






