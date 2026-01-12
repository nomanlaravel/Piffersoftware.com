@include('layouts.header')

@yield('main')
<!--End of the Navbar-->

<!--Customer Form-->
<div class="customer_form">

    <div id="main" style="margin-left: 92%;">
        <button class="openbtn" onclick="openNav()">☰</button>
    </div>

    <div id="mySidebar" class="sidebar admin-setting">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="#"> <i class="bi bi-person-check-fill mr-2"></i> Update Profile</a>
        <a href="administration-setting-page.html"> <i class="bi bi-gear mr-2"></i> Piffers Administration
            Setting</a>
        <a href="#"> <i class="bi bi-people mr-2"></i> Manage Users</a>
        <hr>
        <a href="#"> <i class="bi bi-box-arrow-right mr-2"></i> Logout</a>
    </div>



    <!--Popup model for User new entry-->
    <!-- <div class="modal fade" id="add_user"> -->
        <!-- <div class="modal-dialog" role="document" style="max-width: 75%;"> -->
            <!-- <div class="modal-content border-0"> -->
                <div class="modal-header border-0">

                    <div class="modal-header border-0 d-flex align-items-center" style="margin-left:-37px;">
                        <button type="button" class="btn btn-link" onclick="history.back()">
                            <i class="bi bi-arrow-left"></i>
                        </button>
                        <h4 class="modal-title ml-2" id="exampleModalLabel" style="font-weight: bold;">Requisition</h4>
                    </div>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <!-- <div class="modal-body"> -->
                    <section>
                        <form action="{{ route('submit.req')  }}" method="POST" class="liscence_form  border-0" style="width: 90%;">
                            @csrf
                            <div class=" row main-content div">
                                <h5>Demand Raised By :</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Name : <br>
                                        <input class="form-control"
                                            type="text" name="demand_person_name" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        Employee ID <br> <input class="form-control"
                                            type="text" name="demand_employee_id" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 mt-1">
                                        Cell No. <br> <input class="form-control" name="demand_person_cell" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                      <div class="col-lg-4 mt-1">
                                        Demand Raised By (Department): <br> <input class="form-control" name="demand_raised_by" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                      <div class="col-lg-4 mt-1">
                                        Demand Raised To (Department): <br> <input class="form-control" name="demand_raised_to" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>

                                </div>

                                <div id="myModal" class="modal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.4);">
                                    <div class="modal-content" style="background-color: #fefefe; margin: 15% auto; padding: 20px; border: 1px solid #888; width: 30%; border-radius: 10px; text-align: center;">
                                        <span class="close" style="color: #aaa; float: right; font-size: 28px; font-weight: bold; position: relative; left: 49%;" >&times;</span>
                                        <p id="popupMessage"></p>
                                        <input type="text" id="urlInput" style="width: 98%; margin-top: 20px;" readonly>
                                        <div style="margin-top: 20px;">
                                            <a href="https://mail.google.com/mail/u/0/#inbox" id="gmailIcon" style="text-decoration: none; color: #000; margin-right: 10px;"><i class="fab fa-google" style="font-size: 24px;"></i></a>
                                            <a href="https://web.whatsapp.com/send?text=Check%20out%20this%20link%3A%20" id="whatsappIcon" style="text-decoration: none; color: #000; margin-right: 10px;"><i class="fab fa-whatsapp" style="font-size: 24px;"></i></a>
                                            <span id="copyIcon" style="cursor: pointer; margin-right: 10px;"><i class="fas fa-copy" style="font-size: 24px;"></i></span>
                                            <span id="copyText" style="font-size: 14px; color: green;"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="container my-1">
                                  <div class="accordion" id="signatoryAccordion10">
                                     <!-- Initial Accordion Item -->
                                     <div class="accordion-item signaccordion-item10" id="signatoryEntry10">
                                        <h2 class="accordion-header" id="signatoryHeading10" style="color: white"> <button class="accordion-button" style="background-color: #34005A; color:white" type="button" data-toggle="collapse" data-target="#signatoryCollapse10" aria-expanded="false" aria-controls="signatoryCollapse10"> Report Entry 1 </button> </h2>
                                        <div id="signatoryCollapse10" class="collapse" aria-labelledby="signatoryHeading10">
                                           <div class="accordion-body">
                                                <div class="row mb-2" id="signatoryDetailsContainer7">
                                                    <div class="row mb-2">
                                                        <div class="col-lg-6 spacing-right">
                                                            Date : <br>
                                                            <input class="form-control"
                                                            type="date" name="date[]" placeholder="..."
                                                            style="width: 100%;">
                                                        </div>
                                                         <div class="col-lg-6 spacing-right">
                                                           Requisition Number : <br>
                                                            <input class="form-control"
                                                                type="text" name="requisition_no[]" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            Item Name : <br>
                                                            <input class="form-control"
                                                                type="text" name="item_name[]" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            Item Code <br> <input class="form-control"
                                                                type="text" name="item_code[]" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            Quantity <br> <input class="form-control" name="quantity[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1 spacing-right">
                                                            Description : <br>
                                                            <input class="form-control" name="description[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 spacing-right">
                                                            Manufacturing : <br>
                                                            <input class="form-control" name="manufacturing[]" type="text" placeholder="..."
                                                                style="width: 100%;">
                                                        </div>

                                                        <div class="col-lg-6 mt-1">
                                                            Size <br> <input class="form-control" id="" name="size[]"
                                                                type="text" placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            Artcile No. <br> <input class="form-control" id="" name="article_no[]" type="text"
                                                                placeholder="..." style="width: 100%;">
                                                        </div>
                                                        <div class="col-lg-6 mt-1">
                                                            Any Special Instructions <br> <textarea class="form-control mt-1"
                                                            id="head_office_name" name="any_special_ins[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        Notes <br> <textarea class="form-control mt-1"
                                                            id="head_office_name" name="notes[]"
                                                            type="text" placeholder="..."
                                                            style="width: 100%;"></textarea>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        Attachments <br> <input class="form-control mt-1"
                                                            id="head_office_email" name="attachments[]"
                                                            type="file" placeholder="..."
                                                            style="width: 100%;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                  </div> <!-- Add More and Remove Buttons -->
                                  <div class="row my-3">
                                     <div class="col"> <button type="button" class="btn btn-primary" id="addSignatory10" style="height:30px; width:150px;">Add More </button> </div> <button type="button" class="btn btn-primary" id="updateSignatoryTable10">Save</button>
                                  </div>
                               </div>
                                <table class="table table-bordered mt-1" id="signatorySummaryTable10">
                                  <thead>
                                     <tr>
                                        <th>Date</th>
                                        <th>Item Name</th>
                                        <th>Item Code</th>
                                        <th>Quantity</th>
                                        <th>View</th> <!-- Add more columns as needed -->
                                     </tr>
                                  </thead>
                                  <tbody>
                                     <!-- Summary data will be added here dynamically -->
                                  </tbody>
                               </table>

                            </div>
                            <div class="footer" style="position: fixed; bottom: 0; width: 100%; background-color: #320056; padding: 10px; display: flex; justify-content: space-between; align-items: center; margin-left : -21%;">
                                <a href="{{ route('req') }}"><button type="button" name="cancel" class="btn btn-secondary" style="color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 80px;"><i>Cancel</i></button></a>
                                <div style="display: flex; align-items: center;">
                                    <img src="/public/logo.png" alt="Logo" style="height: 30px; margin-right: 10px;">
                                    <h4 style="color: #fff; margin: 0; font-size: 14px;"><i>PIFFERS SECURITY SERVICES</i></h4>
                                </div>
                                <div class="dropdown" style="position: relative; display: inline-block;">
                                    <button type="button" class="btn btn-primary" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer; width: 150px;"><i style="margin-right:30px;">Submission  &#8594;</i></button>
                                    <div class="dropdown-content" style="display: none; position: absolute; background-color: #f9f9f9; min-width: 130px; box-shadow: 0px -8px 16px 0px rgba(0,0,0,0.2); z-index: 1; bottom: 100%;">
                                        <button type="submit" name="save_and_email" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Email/Whatsapp</i></button>
                                        <button type="submit" name="save_and_share" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & share link</i></button>
                                        <button type="submit" name="save_and_new" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & New</i></button>
                                        <button type="submit" style="color: black; padding: 8px 12px; text-decoration: none; display: inline-block; background-color: #007bff; color: #fff; border: none; width: 100%; text-align: left; font-size: 14px;"><i>Save & Close</i></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </section>
                <!-- </div> -->
            </div>
        <!-- </div> -->
    <!-- </div> -->








<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script> <!-- script for add more consultant details -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.dropdown').addEventListener('mouseover', function () {
            document.querySelector('.dropdown-content').style.display = 'block';
        });

        document.querySelector('.dropdown').addEventListener('mouseout', function () {
            document.querySelector('.dropdown-content').style.display = 'none';
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        var successMessage = '{{ session("success") }}';
        var requisitionId = '{{ session("requisitionId") }}';

        if (successMessage && requisitionId) {
            var url = '{{ route("view.req", ":id") }}';
            url = url.replace(':id', requisitionId);
            var popupMessage = 'Requisition data stored successfully. Please find the URL below:';

            document.getElementById('popupMessage').innerText = popupMessage;

            document.getElementById('urlInput').value = url;

            var modal = document.getElementById('myModal');
            modal.style.display = "block";

            var closeBtn = document.getElementsByClassName("close")[0];
            closeBtn.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }
    });
</script>



<script>
    $(document).ready(function () {
        // Function to update summary table for Signatory entries
        function updateSignatorySummaryTable10() {
            // Clear existing rows
            $('#signatorySummaryTable10 tbody').empty();

            // Iterate through each signatory accordion item and update the summary table
            $('.signaccordion-item10').each(function (index) {
                var date = $(this).find('[name="date[]"]').val();
                var item_name = $(this).find('[name="item_name[]"]').val();
                var item_code = $(this).find('[name="item_code[]"]').val();
                var quantity = $(this).find('[name="quantity[]"]').val();

                // Check if any relevant data is entered
                if (date || item_name || item_code || quantity) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable10 tbody').append(`
                        <tr>
                            <td>${date}</td>
                            <td>${item_name}</td>
                            <td>${item_code}</td>
                            <td>${quantity}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Signatory Button Click Event
        $('#addSignatory10').on('click', function () {
            var signatoryEntryCount10 = $('#signatoryAccordion10 .signaccordion-item10').length + 1;

            var newSignatoryEntry10 = `
                <div class="accordion-item signaccordion-item10" id="signatoryEntry10${signatoryEntryCount10}">
                    <h2 class="accordion-header" id="signatoryHeading10${signatoryEntryCount10}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white" data-toggle="collapse" data-target="#signatoryCollapse10${signatoryEntryCount10}" aria-expanded="false" aria-controls="signatoryCollapse10${signatoryEntryCount10}">
                            Report Entry ${signatoryEntryCount10}
                        </button>
                    </h2>
                    <div id="signatoryCollapse10${signatoryEntryCount10}" class="collapse" aria-labelledby="signatoryHeading10${signatoryEntryCount10}">
                         <div class="accordion-body">
                            <div class="row mb-2" id="signatoryDetailsContainer7">
                                <div class="row mb-2">
                                    <div class="col-lg-6 spacing-right">
                                        Date : <br>
                                        <input class="form-control"
                                        type="date" name="date[]" placeholder="..."
                                        style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-right">
                                        Item Name : <br>
                                        <input class="form-control"
                                            type="text" name="item_name[]" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        Item Code <br> <input class="form-control"
                                            type="text" name="item_code[]" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        Quantity <br> <input class="form-control" name="quantity[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 mt-1 spacing-right">
                                        Description : <br>
                                        <input class="form-control" name="description[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 spacing-right">
                                        Manufacturing : <br>
                                        <input class="form-control" name="manufacturing[]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>

                                    <div class="col-lg-6 mt-1">
                                        Size <br> <input class="form-control" id="" name="size[]"
                                            type="text" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        Artcile No. <br> <input class="form-control" id=" name="article_no[]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-6 mt-1">
                                        Any Special Instructions <br> <textarea class="form-control mt-1"
                                        id="head_office_name" name="any_special_ins[]"
                                        type="text" placeholder="..."
                                        style="width: 100%;"></textarea>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    Notes <br> <textarea class="form-control mt-1"
                                        id="head_office_name" name="notes[]"
                                        type="text" placeholder="..."
                                        style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-6">
                                    Attachments <br> <input class="form-control mt-1"
                                        id="head_office_email" name="attachments[]"
                                        type="file" placeholder="..."
                                        style="width: 100%;">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignatoryAccordion" type="button" style="width:10%; margin-left:13px;">
                            Remove
                        </button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion10').append(newSignatoryEntry10);
        });

        // Update Signatory Table Button Click Event
        $('#updateSignatoryTable10').on('click', function () {
            // Update the signatory summary table
            updateSignatorySummaryTable10();
        });

        // View Signatory Button Click Event
        $(document).on('click', '.view-signatory-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.signaccordion-item10').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Remove Signatory Entry Button Click Event
        $(document).on('click', '.removeSignatoryAccordion', function () {
            $(this).closest('.signaccordion-item10').remove();
            // Update the signatory summary table
            updateSignatorySummaryTable10();
        });

        // Prevent the default behavior of the Add More Signatory button
        $('#addSignatory10').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

</body>

</html>


