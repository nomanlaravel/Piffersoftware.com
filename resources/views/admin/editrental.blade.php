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
        <section>
              <div class="modal-header border-0">
                <div style="display:flex; column-gap:10px; align-items:center">
                    <button type="button" class="btn btn-link" onclick="history.back()">
                     <i class="bi bi-arrow-left"></i>
                    </button>
                    <h5 class="mt-3" style="font-weight: 700;">Rental Property Details: </h5>
                </div>
              </div>
           <form action="{{ route('updaterental', ['id' => $rentals->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class=" row main-content div">
                <div class="col-lg-6">

                    <div class="row mb-2">
                        <div class="col-lg-6 spacing-left mt-1">
                            RP Number <br> <input class="form-control mt-1" id="rp_no" name="rp_no" value="{{ $rentals->rp_no }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left">
                            Type of Property <br> <input class="form-control mt-1" id="type" vl name="type" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left">
                            Description of Property <br> <input class="form-control mt-1" id="desc" value="{{ $rentals->desc }}" name="desc" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-2">
                            Picture of Property <br> <input class="form-control mt-1" id="" value="{{ $rentals->pic }}" name="pic" type="file" placeholder="..." style="width: 100%;"><div class="col-lg-4 spacing-right">
                        <!--Image Preview Biometric-->
                        <div class="image-preview4" id="imagePreview4">
                            <img src="" alt="Image Preview4" class="image-preview__image4" style="height: 30%; width:30%;">
                            <span class="image-preview__default-text4"> Image Preview </span>
                        </div>
                    </div>

                    </div>

                    <div class="col-lg-6 spacing-left spacing-right mt-2">
                        Branch ID <br> <input class="form-control mt-1" id="" name="branch" value="{{ $rentals->branch }}" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="col-lg-5 spacing-left spacing-right mt-2">
                        Reporting to <br> <input class="form-control mt-1" id="" name="report_to" value="{{ $rentals->report_to }}" type="text" placeholder="..." style="width: 100%;">
                    </div>
                    <div class="form-check form-check-inline spacing-left mt-2">
                        <h5 class="form-check-label" for="inlineCheckbox1">Property Caretaker Details :</h5>
                    </div>
                    <div class="col-lg-12 spacing-right mb-4" id="prop-field">
                        <div class="col-lg-6 spacing-left spacing-right">
                            Name <br> <input class="form-control mt-1" id="" name="care_name" value="{{ $rentals->care_name }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-1">
                            Cell <br> <input class="form-control mt-1" id="" name="care_cell" value="{{ $rentals->care_cell }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-1">
                            CNIC <br> <input class="form-control mt-1" id="" name="care_cnic" value="{{ $rentals->care_cnic }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 spacing-left spacing-right mt-1">
                            Attachments <br> <input class="form-control mt-1" id="" name="care_attach" value="{{ $rentals->care_attach }}" type="file" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="form-check form-check-inline spacing-left mt-2">
                        <h5 class="form-check-label" for="inlineCheckbox1">Plaza Management Details :</h5>
                    </div>
                    <div class="col-lg-12 spacing-right mb-4" id="plaza-field">
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Name <br> <input class="form-control mt-1" id="" name="plaza_name" value="{{ $rentals->plaza_name }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Cell <br> <input class="form-control mt-1" id="" name="plaza_cell" value="{{ $rentals->plaza_cell }}"  type="text" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Bank Name <br> <input class="form-control mt-1" id="" name="plaza_bank" value="{{ $rentals->plaza_bank }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Account Number <br> <input class="form-control mt-1" id="" name="plaza_account" value="{{ $rentals->plaza_account }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            CNIC <br> <input class="form-control mt-1" id="" name="plaza_cnic" value="{{ $rentals->plaza_cnic }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Attachments <br> <input class="form-control mt-1" id="" name="plaza_attach" value="{{ $rentals->plaza_attach }}"  type="file" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                    </div>
                    <div class="form-check form-check-inline spacing-left mt-2">
                        <h5 class="form-check-label" for="inlineCheckbox1">Incharge of the Property :</h5>
                    </div>
                    <div class="col-lg-12 spacing-right mb-4" id="incharge-field">
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Name <br> <input class="form-control mt-1 " id="" name="inc_name" value="{{ $rentals->inc_name }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Employeee ID <br> <input class="form-control mt-1" id="" name="inc_id" value="{{ $rentals->inc_id }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Designation <br> <input class="form-control mt-1" id="" name="inc_desig" value="{{ $rentals->inc_desig }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Cell Number <br> <input class="form-control mt-1" id="" name="inc_cell" value="{{ $rentals->inc_cell }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Email <br> <input class="form-control mt-1" id="" name="inc_email" value="{{ $rentals->inc_email }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-1">
                            Attachments <br> <input class="form-control mt-1" id="" name="inc_atatch" value="{{ $rentals->inc_atatch }}" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 mt-4" style="margin-bottom: 40px; width: 50%;">
                        <button type="button" id="add-more-btn" class="add-more-btn" onclick="toggleHiddenDiv()">KITCHEN</button>
                    </div>

                    <div id="hidden-div" style="display: none;">
                        <h5>Inventory Details:</h5>
                        <div id="inventory-container">
                            <div class="row mb-2">
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Item Code <br>
                                    <input class="form-control mt-1" name="inventory_items[][item_code]" type="text" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Attachments <br>
                                    <input class="form-control mt-1" name="inventory_items[][attachment]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Notes <br>
                                    <textarea class="form-control mt-1" name="inventory_items[][notes]" type="file" placeholder="..." style="width: 100%;"></textarea>
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
                                    <input class="form-control mt-1" name="hygiene_items[][hyg_attachments]" type="file" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-5 spacing-left spacing-right">
                                    Notes <br>
                                    <textarea class="form-control mt-1" name="hygiene_items[][hyg_notes]" type="file" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-5" style="width: 50%;">
                                    <button type="button" onclick="addMoreHygieneFields()">Add More</button>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    </div>

                </div>

                <div class="col-lg-6 spacing-left">

                    <h5>Address</h5>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right">
                            Office No <br> <input class="form-control mt-1" id="head_office_cell_no" name="office_no" value="{{ $rentals->office_no }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left">
                            Building <br> <input class="form-control mt-1" id="head_office_cell_no" name="building" value="{{ $rentals->building }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right mt-2">
                            Block <br> <input class="form-control mt-1" id="head_office_cell_no" name="block" value="{{ $rentals->block }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Area <br> <input class="form-control mt-1" id="head_office_cell_no" name="area" value="{{ $rentals->area }}"  type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right mt-2">
                            City <br> <input class="form-control mt-1" id="head_office_cell_no" name="city" value="{{ $rentals->city }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            Location <br> <input class="form-control mt-1" id="head_office_cell_no" name="location" value="{{ $rentals->location }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-5 spacing-right mt-2">
                            PhotoGraph of Building <br> <input class="form-control mt-1" id="photo_b" name="photo_b" value="{{ $rentals->photo_b }}"  type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left mt-2">
                            GPS <br> <input class="form-control mt-1" id="head_office_cell_no" name="gps" value="{{ $rentals->gps }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                    </div>

                    <div class="form-check form-check-inline spacing-left mt-2">
                        <h5 class="form-check-label" for="inlineCheckbox1">Property owner Details :</h5>
                    </div>
                        <div class="col-lg-12 spacing-right mb-4" id="owner-fields">
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right">
                            Owner Name : <br> <input class="form-control mt-1" id="" name="owner_name" value="{{ $rentals->owner_name }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right">
                            Owner CNIC NO : <br> <input class="form-control mt-1" id="" name="owner_cnic" value="{{ $rentals->owner_cnic }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Owner Cell NO : <br> <input class="form-control mt-1" id="" name="owner_cell" value="{{ $rentals->owner_cell }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Owner CNIC (Front) :  <br> <input class="form-control mt-1" id="" name="owner_front" value="{{ $rentals->owner_front }}" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Owner CNIC (Back) : <br> <input class="form-control mt-1" id="" name="owner_back" value="{{ $rentals->owner_back }}" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Owner Bank Name :  <br> <input class="form-control mt-1" id="" name="owner_bank" value="{{ $rentals->owner_bank }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Owner Account Title :  <br> <input class="form-control mt-1" id="" name="owner_acc" value="{{ $rentals->owner_acc }}" type="text" placeholder="..." style="width: 108%;">
                        </div>
                        <div class="col-lg-5  mt-2" style="margin-left: 3px">
                            Owner Account No:  <br> <input class="form-control mt-1" id="" name="owner_acc_no" value="{{ $rentals->owner_acc_no }}" type="text" placeholder="..." style="width: 122%;">
                        </div>
                        </div>
                        </div>
                    </div>






                    <div class="form-check form-check-inline spacing-left mt-2">
                        <h5 class="form-check-label" for="inlineCheckbox1">Utility Bills :</h5>
                    </div>
                    <div class="col-lg-12 spacing-right mb-4" id="ntn-fields">
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right">
                            Electric Meter Reading <br> <input class="form-control mt-1" id="" name="electric" value="{{ $rentals->electric }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right">
                            Attachments <br> <input class="form-control mt-1" id="" name="elec_attach" value="{{ $rentals->elec_attach }}" type="file" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Gas Meter Reading <br> <input class="form-control mt-1" id="" name="gas" value="{{ $rentals->gas }}" type="text" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Attachments <br> <input class="form-control mt-1" id="" name="gas_attach" value="{{ $rentals->gas_attach }}"  type="file" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Date of moving in <br> <input class="form-control mt-1" id="" name="mov_in" value="{{ $rentals->mov_in }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-5 spacing-left spacing-right mt-2">
                            Date of Moving Out <br> <input class="form-control mt-1" id="" name="mov_out" value="{{ $rentals->mov_out }}" type="date" placeholder="..." style="width: 100%;">
                        </div>
                        </div>
                        <div class="row mb-2">
                        <div class="col-md-4">
                            <div class="form-check form-check-inline spacing-left mt-2">
                                <label class="form-check-label" for="last_copy_checkbox">Last Copy of paid Bill</label>
                            </div>
                        </div>
                        <div class="col-md-8" id="attachments_div">
                            <div>
                                Attachments <br>
                                <input class="form-control" id="" name="last_bill" value="{{ $rentals->last_bill }}" type="file" placeholder="..." style="width: 77%;">
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary" style="margin-left: 5px; float:right;">Submit</button>
            </form>
        </section>

    </div>


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
        const checkbox10 = document.getElementById('prop_owner');
        const ownerField = document.getElementById('owner-fields');

        checkbox10.addEventListener('change', (event) => {
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

    <script>
        function addMoreFields() {
        var container = document.getElementById('inventory-container');

        // Create a new div to hold the fields
        var newDiv = document.createElement('div');
        newDiv.className = 'row mb-2';

        // Create the item code field
        var itemCodeField = document.createElement('div');
        itemCodeField.className = 'col-lg-5 spacing-left spacing-right';
        itemCodeField.innerHTML = 'Item Code <br> <input class="form-control mt-1" name="item_code[]" type="text" placeholder="..." style="width: 100%;">';

        // Create the attachments field
        var attachmentsField = document.createElement('div');
        attachmentsField.className = 'col-lg-5 spacing-left spacing-right';
        attachmentsField.innerHTML = 'Attachments <br> <input class="form-control mt-1" name="attachments[]" type="file" placeholder="..." style="width: 100%;">';

        // Create the notes field
        var notesField = document.createElement('div');
        notesField.className = 'col-lg-5 spacing-left spacing-right';
        notesField.innerHTML = 'Notes <br> <textarea class="form-control mt-1" name="notes[]" type="file" placeholder="..." style="width: 100%;"></textarea>';

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
        attachmentsField.innerHTML = 'Attachments <br> <input class="form-control" name="hyg_attachments[]" type="file" placeholder="..." style="width: 100%;">';

        // Create the notes field
        var notesField = document.createElement('div');
        notesField.className = 'col-lg-5 spacing-left spacing-right';
        notesField.innerHTML = 'Notes <br> <textarea class="form-control" name="hyg_notes[]" type="file" placeholder="..." style="width: 100%;"></textarea>';

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



    @include('layouts.footer')
