
<script>
    $(document).ready(function () {
    var openAccordions = []; // Array to store IDs of open accordion items

    // Add More Button Click Event
    $('#addSignatory10').on('click', function () {
        var SignatoryAccordionCount10 = $('#signatoryAccordion10 .signaccordion-item10').length + 1;

        var newSignAccordion10 = `
            <div class="accordion-item signaccordion-item10">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white">
                        Report Entry ${SignatoryAccordionCount10}
                    </button>
                </h2>
                <div class="collapse" id="signatoryCollapse10${SignatoryAccordionCount10}">
                    <div class="accordion-body">
                        <input type="hidden" name="reports[${SignatoryAccordionCount10 - 1}][r_id]" value="">
                        <!-- Your content for signatory entry goes here -->
                        <div class="row mb-2" id="signatoryDetailsContainer10">
                            <div class="col-lg-12" id="consultant_add_fields">
                                <div class=" row mb-2">
                                    <div class="col-lg-4 spacing-right"> Site ID <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][site_id]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Branch <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][branch]" type="text" placeholder="..." style="width: 97%;"> </div>
                                    <div class="col-lg-4 spacing-left"> Location <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][location]" type="text" placeholder="..." style="width: 103%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Authorized Guards <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][auth_guards]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left"> Army <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][army]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left"> SSG <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][ssg]" type="text" placeholder="..." style="width: 103%;"> </div>
                                </div>
                                <div class=" row mb-2">
                                    <div class="col-lg-4 spacing-right"> Civil <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][civil]"  type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Absentees <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][absente]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Leave <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][leave]"  type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Reason <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][reason]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Reliver Provided <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][r_provided]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Last Complaint Date <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][last_comp_date]" type="date" placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class=" row mb-2">
                                    <div class="col-lg-4 spacing-right"> Any Incident & Report No <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][any_inc]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Pending Nadra Versys <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][pending_nadra]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Unsent DPO Reports <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][unsent_dpo_rep]"  type="text" placeholder="..." style="width: 100%;"></input> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> No. of resigns <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][no_of_resigns]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Guards without bank started <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][guards_wout_bank]"  type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Any new Site Started <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][any_new_site]" type="text" placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-left spacing-right"> No. of Guards <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][no_of_guards]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Details of Escort Duties <br> <textarea class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][escort_duties]" type="text" placeholder="..." style="width: 100%;"></textarea> </div>
                                    <div class="col-lg-4 spacing-right"> Details of Events <br> <textarea class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][event_details]" type="text" placeholder="..." style="width: 100%;"></textarea> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Amount of pending Recoveries <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][pending_recoveries]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Signature of Manager Accounts <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][sign_manager]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Any staff on annual leave <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][staff_on_leav]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Any short leave of staff with Name <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][short_leav]" type="text" placeholder="..." style="width: 100%;"> </div>
                                </div>
                                <h5>Checklist :</h5>
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-left spacing-right"> Utility Bills Paid<br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][utility_bills]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right">Bio Matric Working <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][bio_matric]" type="text" placeholder="..." style="width: 100%;"></div>
                                    <div class="col-lg-4 spacing-right">Bio Register Maintained  <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][bio_register]" type="text" placeholder="..." style="width: 100%;"></div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Office Rent Paid  <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][office_rent]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> UPS Working <br> <input class="form-control" id=""  name="reports[${SignatoryAccordionCount10 - 1}][ups]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> Guard File Maintained  <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][guard_file]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right">  Guard Accomodation Rent Paid <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][guard_accomodation]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Any Maintainance Required  <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][any_maintainence]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right"> Weapon Register Maintained <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][weapon_register]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-right"> CCTV Working  <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][cctv]"  type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right">  Attendance Register Maintained <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][attendance_register]" type="text" placeholder="..." style="width: 100%;"> </div>
                                    <div class="col-lg-4 spacing-left spacing-right">  Kote Register Maintained <br> <input class="form-control" id="" name="reports[${SignatoryAccordionCount10 - 1}][kote_register]" type="text" placeholder="..." style="width: 100%;"> </div>
                                </div>
                        
                            </div>
                        </div>
                    </div>
                     <button class="btn btn-danger removeSignAccordion10" type="button" style="width:10%; margin-left:13px;">
                         Remove
                     </button>
                </div>
            </div>
        `;

        $('#signatoryAccordion10').append(newSignAccordion10);
    });

    // Remove Accordion Button Click Event
    $(document).on('click', '.removeSignAccordion10', function () {
        var accordionItem = $(this).closest('.accordion-item');
        var accordionId = accordionItem.find('.collapse').attr('id');
        var index = openAccordions.indexOf(accordionId);
        if (index !== -1) {
            openAccordions.splice(index, 1); // Remove accordion ID from openAccordions array
        }
        accordionItem.remove();
    });

    // Accordion Button Click Event
    $(document).on('click', '.accordion-button', function () {
        var accordionItem = $(this).closest('.accordion-item');
        var accordionId = accordionItem.find('.collapse').attr('id');
        var isOpen = openAccordions.includes(accordionId);

        if (!isOpen) {
            openAccordions.push(accordionId); // Add accordion ID to openAccordions array
            accordionItem.find('.collapse').addClass('show');
        } else {
            var index = openAccordions.indexOf(accordionId);
            if (index !== -1) {
                openAccordions.splice(index, 1); // Remove accordion ID from openAccordions array
            }
            accordionItem.find('.collapse').removeClass('show');
        }
    });
});

</script>


<script>
   $(document).ready(function () {
       // Function to update summary table for Vehicle entries
       function updateSignatorySummaryTable10() {
           // Clear existing rows
           $('#signatorySummaryTable10 tbody').empty();
   
           // Iterate through each guard accordion item and update the summary table
           $('.signaccordion-item10').each(function (index) {
               var site_id = $(this).find('[name="site_id[]"]').val();
               var branch = $(this).find('[name="branch[]"]').val();
               var location = $(this).find('[name="location[]"]').val();
               var auth_guards = $(this).find('[name="auth_guards[]"]').val();
               var army = $(this).find('[name="army[]"]').val();
               var ssg = $(this).find('[name="ssg[]"]').val();
   
               // Check if any relevant data is entered
               if (site_id || branch || location || auth_guards || army || ssg) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable10 tbody').append(`
                               <tr>
                                   <td>${index + 1}</td>
                                   <td>${site_id}</td>
                                   <td>${branch}</td>
                                   <td>${location}</td>
                                   <td>${auth_guards}</td>
                                   <td>${army}</td>
                                   <td>${ssg}</td>
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
                       <!-- Your existing signatory accordion HTML goes here -->
                       
                   `;
           console.log('Adding signatory entry:', signatoryEntryCount10);
           $('#signatoryAccordion10').append(newSignatoryEntry10);
       });
   
       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable10').on('click', function () {
           // Update the signatory summary table
           console.log("clicked save");
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
 <!-- script for add more Issuing Authority -->
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory11').on('click', function () {
            var SignatoryAccordionCount11 = $('#signatoryAccordion11 .signaccordion-item11').length + 1;

            var newSignAccordion11 = `
                <div class="accordion-item signaccordion-item11" id="signatoryEntry11${SignatoryAccordionCount11}">
                    <h2 class="accordion-header" id="signatoryHeading11${SignatoryAccordionCount11}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse11${SignatoryAccordionCount11}" aria-expanded="false" aria-controls="signatoryCollapse11${SignatoryAccordionCount11}">
                            Office Equipment ${SignatoryAccordionCount11}
                        </button>
                    </h2>
                    <div id="signatoryCollapse11${SignatoryAccordionCount11}" class="collapse" aria-labelledby="signatoryHeading11${SignatoryAccordionCount11}">
                        <div class="accordion-body">
                            <input type="hidden" name="inventories[${SignatoryAccordionCount11 - 1}][i_id]" value="">
                            <div class="row mb-2" id="signatoryDetailsContainer11">
                                <div class="col-lg-12" id="authority_add_fields">
                                    <div class="row mb-2">
                                        <div class="col-lg-4 spacing-right"> Equipment Name <br> <input class="form-control" id=""  name="inventories[${SignatoryAccordionCount11 - 1}][category]" type="text" placeholder="..." style="width: 100%;"> </div>
                                        <div class="col-lg-4 spacing-left spacing-right"> Quantity <br> <input class="form-control" id=""  name="inventories[${SignatoryAccordionCount11 - 1}][quantity]" type="text" placeholder="..." style="width: 100%;"> </div>
                                        <div class="col-lg-4 spacing-right"> Notes <br> <textarea class="form-control" id=""  name="inventories[${SignatoryAccordionCount11 - 1}][notes]" type="text" placeholder="..." style="width: 100%;"></textarea> </div>
                                        <div class="col-lg-4 spacing-right"> Attachments <br> <input class="form-control" id="" name="inventories[${SignatoryAccordionCount11 - 1}][attachments]" type="file" placeholder="..." style="width: 90%;"> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignAccordion11" type="button" style="width:10%; margin-left:13px;">
                            Remove
                        </button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion11').append(newSignAccordion11);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion11', function () {
            $(this).closest('.signaccordion-item11').remove();
        });
    });
</script>

<script>
   $(document).ready(function () {
       // Function to update summary table for Vehicle entries
       function updateSignatorySummaryTable11() {
           // Clear existing rows
           $('#signatorySummaryTable11 tbody').empty();
   
           // Iterate through each guard accordion item and update the summary table
           $('.signaccordion-item11').each(function (index) {
               var category = $(this).find('[name="category[]"]').val();
               var quantity = $(this).find('[name="quantity[]"]').val();
               var notes = $(this).find('[name="notes[]"]').val();
               
               // Check if any relevant data is entered
               if (category || quantity || notes) {
                   // Add a new row to the summary table
                   $('#signatorySummaryTable11 tbody').append(`
                               <tr>
                                   <td>${index + 1}</td>
                                   <td>${category}</td>
                                   <td>${quantity}</td>
                                   <td>${notes}</td>
                                   <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                                   <!-- Add more columns as needed -->
                               </tr>
                           `);
               }
           });
       }
   
       // Add More Signatory Button Click Event
       $('#addSignatory11').on('click', function () {
           var signatoryEntryCount11 = $('#signatoryAccordion11 .signaccordion-item11').length + 1;
   
           var newSignatoryEntry11 = `
                       <!-- Your existing signatory accordion HTML goes here -->
                       
                   `;
           console.log('Adding signatory entry:', signatoryEntryCount11);
           $('#signatoryAccordion11').append(newSignatoryEntry11);
       });
   
       // Update Signatory Table Button Click Event
       $('#updateSignatoryTable11').on('click', function () {
           // Update the signatory summary table
           console.log("clicked save");
           updateSignatorySummaryTable11();
       });
   
       // View Signatory Button Click Event
       $(document).on('click', '.view-signatory-button', function () {
           var index = $(this).data('index');
           var accordionItem = $('.signaccordion-item11').eq(index);
   
           // Toggle the collapse state of the accordion item
           accordionItem.find('.collapse').collapse('toggle');
       });
   
       // Remove Signatory Entry Button Click Event
       $(document).on('click', '.removeSignatoryAccordion', function () {
           $(this).closest('.signaccordion-item11').remove();
           // Update the signatory summary table
           updateSignatorySummaryTable11();
       });
   
       // Prevent the default behavior of the Add More Signatory button
       $('#addSignatory11').on('click', function (event) {
           event.preventDefault();
       });
   });
</script>

{{-- Office Branding --}}
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory13').on('click', function () {
            var SignatoryAccordionCount13 = $('#signatoryAccordion13 .signaccordion-item13').length + 1;
    
            var newSignAccordion13 = `
                <div class="accordion-item signaccordion-item13" id="signatoryEntry13${SignatoryAccordionCount13}">
                    <h2 class="accordion-header" id="signatoryHeading13${SignatoryAccordionCount13}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse13${SignatoryAccordionCount13}" aria-expanded="false" aria-controls="signatoryCollapse13${SignatoryAccordionCount13}">
                            Vehcile Entry ${SignatoryAccordionCount13}
                        </button>
                    </h2>
                    <div id="signatoryCollapse13${SignatoryAccordionCount13}" class="collapse" aria-labelledby="signatoryHeading13${SignatoryAccordionCount13}">
                        <div class="accordion-body">
                            <input type="hidden" name="moveables[${SignatoryAccordionCount13 - 1}][m_id]" value="">
                            <div class="col-lg-12">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Type of Vehicle <br> <input class="form-control"
                                                name="type_of_vehicle[]" name="moveables[${SignatoryAccordionCount13 - 1}][type_of_vehicle]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Vehicle No <br> <input class="form-control"
                                                name="vehicle_no[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_no]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Vehicle Model <br> <input class="form-control"
                                            name="vehicle_model[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_model]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Vehicle Picture <br> <input class="form-control" 
                                            name="vehicle_pic[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_pic]" type="file" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Vehicle Book Picture <br> <input class="form-control"
                                            name="vehicle_book_pic[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_book_pic]" type="file"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left">
                                        Payment Type <br> <input class="form-control" 
                                        name="payment_type[]" name="moveables[${SignatoryAccordionCount13 - 1}][payment_type]" type="text" placeholder="..."
                                        style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Vehicle Name <br> <input class="form-control"
                                                name="vehicle_name[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_name]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Engine No. <br> <input class="form-control"
                                                name="engine_no[]" name="moveables[${SignatoryAccordionCount13 - 1}][engine_no]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Chasis No. <br> <input class="form-control" 
                                            name="chasis_no[]" name="moveables[${SignatoryAccordionCount13 - 1}][chasis_no]" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-left spacing-right">
                                        Vehicle Color <br> <input class="form-control"
                                                name="vehicle_color[]" name="moveables[${SignatoryAccordionCount13 - 1}][vehicle_color]" type="text"
                                            placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            </div>
                        <button class="btn btn-danger removeSignAccordion13" type="button" style="width:10%; margin-left:13px;">
                            Remove
                        </button>
                    </div>
                </div>
            `;
    
            $('#signatoryAccordion13').append(newSignAccordion13);
        });
    
        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion13', function () {
            $(this).closest('.signaccordion-item13').remove();
        });
    });
</script> <!-- Script for Issuing Authority in Table -->
<script>
$(document).ready(function () {
    // Function to update summary table for Vehicle entries
    function updateSignatorySummaryTable13() {
        // Clear existing rows
        $('#signatorySummaryTable13 tbody').empty();

        // Iterate through each accordion item and update the summary table
        $('.signaccordion-item13').each(function (index) {
            var selectedOption = $(this).find('[name="type_of_vehicle[]"] option:selected');
            var typeOfVehicleText = selectedOption.text(); // Fetch the text content of the selected option
            var vehicleNo = $(this).find('[name="vehicle_no[]"]').val();
            var vehicleModel = $(this).find('[name="vehicle_model[]"]').val();

            // Check if any relevant data is entered
            if (typeOfVehicleText || vehicleNo || vehicleModel) {
                // Add a new row to the summary table
                $('#signatorySummaryTable13 tbody').append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${typeOfVehicleText}</td> <!-- Use typeOfVehicleText to display the text content of the selected option -->
                        <td>${vehicleNo}</td>
                        <td>${vehicleModel}</td>
                        <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                        <!-- Add more columns as needed -->
                    </tr>
                `);
            }
        });

    }

    // Add More Signatory Button Click Event
    $('#addSignatory13').on('click', function () {
        var signatoryEntryCount13 = $('#signatoryAccordion13 .signaccordion-item13').length + 1;

        var newSignatoryEntry13 = `
            <!-- Your existing signatory accordion HTML goes here -->
        `;

        console.log('Adding signatory entry:', signatoryEntryCount13);
        $('#signatoryAccordion13').append(newSignatoryEntry13);

        // Update the signatory summary table after adding a new signatory entry
        updateSignatorySummaryTable13();
    });

    // Update Signatory Table Button Click Event
    $('#updateSignatoryTable13').on('click', function () {
        // Update the signatory summary table
        updateSignatorySummaryTable13();
    });

    // View Signatory Button Click Event
    $(document).on('click', '.view-signatory-button', function () {
        var index = $(this).data('index');
        var accordionItem = $('.signaccordion-item13').eq(index);

        // Toggle the collapse state of the accordion item
        accordionItem.find('.collapse').collapse('toggle');
    });

    // Remove Signatory Entry Button Click Event
    $(document).on('click', '.removeSignatoryAccordion', function () {
        $(this).closest('.signaccordion-item13').remove();

        // Update the signatory summary table after removing a signatory entry
        updateSignatorySummaryTable13();
    });
});

</script>

<script>
$(document).ready(function () {
    // Add More Button Click Event
    $('#addBranding').on('click', function () {
        var brandingAccordionCount = $('#brandingAccordion .brandingaccordion-item').length + 1;

        var newBrandingAccordion = `
            <div class="accordion-item brandingaccordion-item" id="brandingEntry${brandingAccordionCount}">
                <h2 class="accordion-header" id="brandingHeading${brandingAccordionCount}">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#brandingCollapse${brandingAccordionCount}" aria-expanded="false" aria-controls="brandingCollapse${brandingAccordionCount}">
                        Office Branding ${brandingAccordionCount}
                    </button>
                </h2>
                <div id="brandingCollapse${brandingAccordionCount}" class="collapse" aria-labelledby="brandingHeading${brandingAccordionCount}">
                    <div class="accordion-body">
                        <input  type="hidden" name="brandings[${brandingAccordionCount - 1}][b_id]" >
                        <div id="inspectionDiv">
                            <div id="inspectionInfo">
                                <div class="row mb-2">
                                    <div class="col-lg-4 spacing-right">
                                      Branding Type <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][b_type]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                      Picture of Branding <br> <input class="form-control" type="file" name="brandings[${brandingAccordionCount - 1}][picture_of_b]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-4 spacing-right">
                                      Site of Branding. <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][site_of_b]" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                  <div class="col-lg-4 spacing-right">
                                    Branding Cost <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][cost_of_b]" placeholder="" style="width: 100%;">
                                    <div id="phoneError" class="error-message-phone" style="color: red"></div>
                                </div>
                                  <div class="col-lg-4 spacing-right">
                                      Periodical Maintenance <br> 
                                      <select class="form-control" name="brandings[${brandingAccordionCount - 1}][periodical_m]" id="periodicalMaintenance" style="width: 100%;" onchange="toggleMaintenanceDateInput()">
                                          <option value=""></option>
                                          <option value="yes">Yes</option>
                                          <option value="no">No</option>
                                      </select>
                                  </div> 
                                  
                                  <div class="col-lg-4 spacing-right" id="maintenanceDateField">
                                      Maintenance Date <br> 
                                      <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][maintenance_date]" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                                <div class="row mb-2">
                                    <h5>Details of Vendor</h5>
                                    <div class="col-lg-3 spacing-left" >
                                      Vendor ID/No. <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][vendor_id]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Vendor Name<br> <input class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_name]" placeholder="..." style="width: 100%;" ></textarea>
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      Vendor Cell Number. <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][v_cell]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Office Number<br> <input class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_office]" placeholder="..." style="width: 100%;" >
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      Floor <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][v_floor]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Building<br> <input class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_building]" placeholder="..." style="width: 100%;" >
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      Block <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][v_block]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Area<br> <input class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_area]" placeholder="..." style="width: 100%;" >
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      City <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][v_city]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Photograph of Building<br> <input class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_photo_b]" placeholder="..." style="width: 100%;" >
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      Pin Location <br> <input class="form-control" type="text" name="brandings[${brandingAccordionCount - 1}][v_pin]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Notes<br> <textarea class="form-control" id="inpFile2" type="text" name="brandings[${brandingAccordionCount - 1}][v_notes]"  placeholder="..." style="width: 100%;" ></textarea>
                                    </div>
                                    <div class="col-lg-3 spacing-left" >
                                      Attachments <br> <input class="form-control" type="file" name="brandings[${brandingAccordionCount - 1}][v_attach]" placeholder="..." style="width: 100%;">
                                    </div>
                                </div>
                              
                                
                            </div>   
                        </div>
  
                      </div>
                </div>
            </div>
        `;

        $('#brandingAccordion').append(newBrandingAccordion);
    });

    // Remove Accordion Button Click Event
    $(document).on('click', '.removeBrandingAccordion', function () {
        $(this).closest('.brandingaccordion-item').remove();
    });
});
</script>



  

<script>
  $(document).ready(function () {
      // Function to update summary table for inspection entries
      function updateInspectionSummaryTable() {
          // Clear existing rows
          $('#inspectionSummaryTable tbody').empty();

          // Iterate through each inspection accordion item and update the summary table
          $('.inspectionaccordion-item').each(function (index) {
              var btype = $(this).find('[name="b_type[]"]').val();
              var siteofB = $(this).find('[name="site_of_b[]"]').val();
              var costofB = $(this).find('[name="cost_of_b[]"]').val();

              // Check if any relevant data is entered
              if (btype || siteofB || costofB) {
                  // Add a new row to the summary table
                  $('#inspectionSummaryTable tbody').append(`
                      <tr>
                          <td>${index + 1}</td>
                          <td>${btype}</td>
                          <td>${siteofB}</td>
                          <td>${costofB}</td>
                          <td><button type="button" style="width: 55%;" class="btn btn-primary view-inspection-button" data-index="${index}">View</button></td>
                          <!-- Add more columns as needed -->
                      </tr>
                  `);
              }
          });
      }

      // Add More Inspection Button Click Event
      $('#addInspection').on('click', function () {
          var inspectionEntryCount = $('#inspectionAccordion .inspectionaccordion-item').length + 1;

          var newInspectionEntry = `
              <!-- Your existing inspection accordion HTML goes here -->
          `;
          console.log('Adding inspection entry:', inspectionEntryCount);
          $('#inspectionAccordion').append(newInspectionEntry);
      });

      // Update Inspection Table Button Click Event
      $('#updateInspectionTable').on('click', function () {
          // Update the inspection summary table
          updateInspectionSummaryTable();
      });

      // View Inspection Button Click Event
      $(document).on('click', '.view-inspection-button', function () {
          var index = $(this).data('index');
          var accordionItem = $('.inspectionaccordion-item').eq(index);

          // Toggle the collapse state of the accordion item
          accordionItem.find('.collapse').collapse('toggle');
      });

      // Prevent the default behavior of the Add More Inspection button
      $('#addInspection').on('click', function (event) {
          event.preventDefault();
      });
  });
</script>

<script>
  $(document).ready(function () {
      // Add More Button Click Event
      $('#addArmour').on('click', function () {
          var ArmourAccordionCount = $('#armourAccordion .armouraccordion-item').length + 1;

          var newArmourAccordion = `
              <div class="accordion-item armouraccordion-item" id="armourEntry${ArmourAccordionCount}">
                  <h2 class="accordion-header" id="armourHeading${ArmourAccordionCount}">
                      <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#armourCollapse${ArmourAccordionCount}" aria-expanded="false" aria-controls="armourCollapse${ArmourAccordionCount}">
                          Token Entry ${ArmourAccordionCount}
                      </button>
                  </h2>
                  <div id="armourCollapse${ArmourAccordionCount}" class="collapse" aria-labelledby="armourHeading${ArmourAccordionCount}">
                    <div class="accordion-body">
                        <input type="hidden" name="tokens[${ArmourAccordionCount - 1}][t_id]" value="">
                        <div id="cleaningInfo">
                            <div class="row col-lg-12">
                                <div class="col-lg-4 spacing-right">
                                    Amount Paid <br> <input class="form-control" type="text" name="tokens[${ArmourAccordionCount - 1}][amount_paid]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Type of Payment <br> <input class="form-control" type="text" name="tokens[${ArmourAccordionCount - 1}][type_of_payment]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Instrument Number <br> <input class="form-control" type="text" name="tokens[${ArmourAccordionCount - 1}][ins_no]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Voucher No. <br> <input class="form-control" type="text" name="tokens[${ArmourAccordionCount - 1}][voucher_no]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Payment Date <br> <input class="form-control" type="date" name="tokens[${ArmourAccordionCount - 1}][payment_date]" placeholder="..." style="width: 100%;">
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Notes <br> <textarea class="form-control" type="text"  name="tokens[${ArmourAccordionCount - 1}][token_note]" placeholder="..." style="width: 100%;"></textarea>
                                </div>
                                <div class="col-lg-4 spacing-right">
                                    Attachment <br> <input class="form-control" type="file" name="tokens[${ArmourAccordionCount - 1}][token_attach]" placeholder="..." style="width: 100%;">
                                </div>
                            </div>
                            
                          
                        </div>
                        
                    </div>
                    <button class="btn btn-danger btn-sm removeArmourAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                  </div>
              </div>
          `;

          $('#armourAccordion').append(newArmourAccordion);
      });

      // Remove Accordion Button Click Event
      $(document).on('click', '.removeArmourAccordion', function () {
          $(this).closest('.armouraccordion-item').remove();
      });
  });
</script>

<!-- JavaScript code -->
<script>
  $(document).ready(function () {
      // Function to update summary table for armour entries
      function updateArmourSummaryTable() {
          // Clear existing rows
          $('#armourSummaryTable tbody').empty();

          // Iterate through each armour accordion item and update the summary table
          $('.armouraccordion-item').each(function (index) {
              var amountPaid = $(this).find('[name="amount_paid[]"]').val();
              var typeOfPayment = $(this).find('[name="type_of_payment[]"]').val();
              var insNo = $(this).find('[name="ins_no[]"]').val();
              var voucherNo = $(this).find('[name="voucher_no[]"]').val();

              // Check if any relevant data is entered
              if (amountPaid || typeOfPayment || insNo || voucherNo) {
                  // Add a new row to the summary table
                  $('#armourSummaryTable tbody').append(`
                      <tr>
                          <td>${index + 1}</td>
                          <td>${amountPaid}</td>
                          <td>${typeOfPayment}</td>
                          <td>${insNo}</td>
                          <td>${voucherNo}</td>
                          <td><button type="button" style="width: 64%;" class="btn btn-primary view-armour-button" data-index="${index}">View</button></td>
                          <!-- Add more columns as needed -->
                      </tr>
                  `);
              }
          });
      }

      // Add More Armour Button Click Event
      $('#addArmour').on('click', function () {
          var armourEntryCount = $('#armourAccordion .armouraccordion-item').length + 1;

          var newArmourEntry = `
              <!-- Your existing armour accordion HTML goes here -->
          `;
          console.log('Adding armour entry:', armourEntryCount);
          $('#armourAccordion').append(newArmourEntry);
      });

      // Update Armour Table Button Click Event
      $('#updateArmourTable').on('click', function () {
          // Update the armour summary table
          updateArmourSummaryTable();
      });

      // View Armour Button Click Event
      $(document).on('click', '.view-armour-button', function () {
          var index = $(this).data('index');
          var accordionItem = $('.armouraccordion-item').eq(index);

          // Toggle the collapse state of the accordion item
          accordionItem.find('.collapse').collapse('toggle');
      });

      // Prevent the default behavior of the Add More Armour button
      $('#addArmour').on('click', function (event) {
          event.preventDefault();
      });
  });
</script>
{{-- Insurance Company Details --}}

<script>
  $(document).ready(function () {
      // Add More Button Click Event
      $('#addAudit').on('click', function () {
          var AuditAccordionCount = $('#auditAccordion .auditaccordion-item').length + 1;

          var newAuditAccordion = `
              <div class="accordion-item auditaccordion-item" id="auditEntry${AuditAccordionCount}">
                  <h2 class="accordion-header" id="auditHeading${AuditAccordionCount}">
                      <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#auditCollapse${AuditAccordionCount}" aria-expanded="false" aria-controls="auditCollapse${AuditAccordionCount}">
                          Insurance Company Details Entry ${AuditAccordionCount}
                      </button>
                  </h2>
                  <div id="auditCollapse${AuditAccordionCount}" class="collapse" aria-labelledby="auditHeading${AuditAccordionCount}">
                    <div class="accordion-body">
                        <input type="hidden" name="insurrances[${AuditAccordionCount - 1}][ins_id]" value="">
                      <div class=" row main-content div" id="auditsInfo">
                          <div class="col-lg-12">
                              <h5>POC :</h5>
                              <div class="row mb-2">
                                  <div class="col-lg-3 spacing-right">
                                      Company Name : <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][company_name]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Name <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_name]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Web <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_web]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Email <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_email]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Cell Number : <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_cell]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Value of Sum Insured <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][value_of_sum]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Insurance Policy Attachment <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][ins_p_pic]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Certificate of Insurrance <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][c_of_ins]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <h5>Address</h5>
                                  <div class="col-lg-3 spacing-right">
                                    Office No. : <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_office]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Floor No. <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_floor]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Building <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_building]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Block <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_block]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Area <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_area]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      City <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_city]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Photograph of Location <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_loc]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Pin Location <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][i_poc_pin]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                          </div>
                          
                          <div class="row mb-2">
                              <div class="col-lg-6 spacing-right mt-2">
                              Notes <br>
                              <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="insurrances[${AuditAccordionCount - 1}][ins_note]" rows="2" cols="38">
                              </textarea>
                              </div>
                              <div class="col-lg-6 spacing-left spacing-right mt-2">
                                  Attachments <br> <input class="form-control" name="insurrances[${AuditAccordionCount - 1}][ins_attach]" type="file" placeholder="..." style="width: 70%;" multiple>
                              </div>
                              
                          </div>
                          
                      </div>
                        
                  </div>
                      <button class="btn btn-danger btn-sm removeAuditAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                  </div>
              </div>
          `;

          $('#auditAccordion').append(newAuditAccordion);
      });

      // Remove Accordion Button Click Event
      $(document).on('click', '.removeAuditAccordion', function () {
          $(this).closest('.auditaccordion-item').remove();
      });
  });
</script>

<script>
  $(document).ready(function () {
      // Function to update audit summary table for audit entries
      function updateAuditSummaryTable() {
          // Clear existing rows
          $('#auditSummaryTable tbody').empty();

          // Iterate through each audit accordion item and update the summary table
          $('.auditaccordion-item').each(function (index) {
              var companyName = $(this).find('[name="company_name[]"]').val();
              var iPocName = $(this).find('[name="i_poc_name[]"]').val();
              var iPocCell = $(this).find('[name="i_poc_cell[]"]').val();

              // Check if any relevant data is entered
              if (companyName || iPocName || iPocCell) {
                  // Add a new row to the summary table
                  $('#auditSummaryTable tbody').append(`
                      <tr>
                          <td>${index + 1}</td>
                          <td>${companyName}</td>
                          <td>${iPocName}</td>
                          <td>${iPocCell}</td>
                          <td><button type="button" style="width : 65%;" class="btn btn-primary view-audit-button" data-index="${index}">View</button></td>
                          <!-- Add more columns as needed -->
                      </tr>
                  `);
              }
          });
      }

      // Add More Audit Button Click Event
      $('#addAudit').on('click', function () {
          var auditEntryCount = $('#auditAccordion .auditaccordion-item').length + 1;

          var newAuditEntry = `
              <!-- Your existing audit accordion HTML goes here -->
          `;
          console.log('Adding audit entry:', auditEntryCount);
          $('#auditAccordion').append(newAuditEntry);
      });

      // Update Audit Table Button Click Event
      $('#updateAuditTable').on('click', function () {
          // Update the audit summary table
          updateAuditSummaryTable();
      });

      // View Audit Button Click Event
      $(document).on('click', '.view-audit-button', function () {
          var index = $(this).data('index');
          var accordionItem = $('.auditaccordion-item').eq(index);

          // Toggle the collapse state of the accordion item
          accordionItem.find('.collapse').collapse('toggle');
      });

      // Prevent the default behavior of the Add More Audit button
      $('#addAudit').on('click', function (event) {
          event.preventDefault();
      });
  });
</script>


   {{-- Tracker Tab Accordion --}}
   <script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addPromact').on('click', function () {
            var PromactAccordionCount = $('#promactAccordion .promactaccordion-item').length + 1;

            var newPromactAccordion = `
                <div class="accordion-item promactaccordion-item" id="promactEntry${PromactAccordionCount}">
                    <h2 class="accordion-header" id="promactHeading${PromactAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#promactCollapse${PromactAccordionCount}" aria-expanded="false" aria-controls="promactCollapse${PromactAccordionCount}">
                            Tracker Details Entry ${PromactAccordionCount}
                        </button>
                    </h2>
                    <div id="promactCollapse${PromactAccordionCount}" class="collapse" aria-labelledby="promactHeading${PromactAccordionCount}">
                        <div class="accordion-body">
                            <input type="hidden" name="trackers[${PromactAccordionCount - 1}][tr_id]" value="">
                          <div class=" row main-content div" id="">
          
                              <div class="col-lg-12">
                                  <h5>POC :</h5>
                                  <div class="row mb-2">
                                      <div class="col-lg-3 spacing-right">
                                          Company Name : <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][tracker_company_name]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-left spacing-right">
                                          Name <br> <input class="form-control"  name="trackers[${PromactAccordionCount - 1}][t_poc_name]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Web <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_web]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Email <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_email]" type="text" placeholder="..." style="width: 100%;">
                                      </div>

                                      <div class="col-lg-3 spacing-right">
                                        Cell Number : <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_cell]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <h5>Address</h5>
                                      <div class="col-lg-3 spacing-right">
                                        Office No. : <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_office]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-left spacing-right">
                                          Floor No. <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_floor]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Building <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_building]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Block <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_block]" type="text" placeholder="..." style="width: 100%;">
                                      </div>

                                      <div class="col-lg-3 spacing-right">
                                        Area <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_area]"  type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-left spacing-right">
                                          City <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_city]" name="t_poc_city[]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Photograph of Location <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_loc]" type="file" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-lg-3 spacing-right">
                                          Pin Location <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][t_poc_pin]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="row mb-2">
                                  <div class="col-lg-6 spacing-right mt-2">
                                  Notes <br>
                                  <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="trackers[${PromactAccordionCount - 1}][tracker_note]" rows="2" cols="38">
                                  </textarea>
                                  </div>
                                  <div class="col-lg-6 spacing-left spacing-right mt-2">
                                      Attachments <br> <input class="form-control" name="trackers[${PromactAccordionCount - 1}][tracker_attach]"  type="file" placeholder="..." style="width: 70%;" multiple>
                                  </div>
                              </div>
                              
                          </div>
                            
                        </div>
                        <button class="btn btn-danger btn-sm removePromactAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;

            $('#promactAccordion').append(newPromactAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removePromactAccordion', function () {
            $(this).closest('.promactaccordion-item').remove();
        });
    });
</script>

<!-- JavaScript Function to Update Summary Table -->
<script>
    $(document).ready(function () {
        // Function to update promotional activity summary table
        function updatePromactSummaryTable() {
            // Clear existing rows
            $('#promactSummaryTable tbody').empty();

            // Iterate through each promotional activity accordion item and update the summary table
            $('.promactaccordion-item').each(function (index) {
                // Extract relevant information
                var trackerCompanyName = $(this).find('[name="tracker_company_name[]"]').val();
                var tPocName = $(this).find('[name="t_poc_name[]"]').val();
                var tPocCell = $(this).find('[name="t_poc_cell[]"]').val();

                // Check if any relevant data is entered
                if (trackerCompanyName || tPocName || tPocCell) {
                    // Add a new row to the summary table
                    $('#promactSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${trackerCompanyName}</td>
                            <td>${tPocName}</td>
                            <td>${tPocCell}</td>
                            <td><button type="button" style="width : 64%;" class="btn btn-primary view-promact-button" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        // Add More Promotional Button Click Event
        $('#addPromact').on('click', function () {
            var promactEntryCount = $('#promactAccordion .promactaccordion-item').length + 1;

            var newPromactEntry = `
                <!-- Your existing promotional activity accordion HTML goes here -->
            `;
            console.log('Adding promotional activity entry:', promactEntryCount);
            $('#promactAccordion').append(newPromactEntry);
        });

        // Update Promotional Activity Table Button Click Event
        $('#updatePromactTable').on('click', function () {
            // Update the promotional activity summary table
            updatePromactSummaryTable();
        });

        // View Promotional Activity Button Click Event
        $(document).on('click', '.view-promact-button', function () {
            var index = $(this).data('index');
            var accordionItem = $('.promactaccordion-item').eq(index);

            // Toggle the collapse state of the accordion item
            accordionItem.find('.collapse').collapse('toggle');
        });

        // Prevent the default behavior of the Add More Promotional button
        $('#addPromact').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>

{{-- Repair & Maintenance Accordion  --}}
<script>
  $(document).ready(function () {
      // Add More Button Click Event
      $('#addNotification').on('click', function () {
          var NotificationAccordionCount = $('#notificationAccordion .notificationaccordion-item').length + 1;

          var newNotificationAccordion = `
              <div class="accordion-item notificationaccordion-item" id="notificationEntry${NotificationAccordionCount}">
                  <h2 class="accordion-header" id="notificationHeading${NotificationAccordionCount}">
                      <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#notificationCollapse${NotificationAccordionCount}" aria-expanded="false" aria-controls="notificationCollapse${NotificationAccordionCount}">
                          Repair & Maintenance Entry ${NotificationAccordionCount}
                      </button>
                  </h2>
                  <div id="notificationCollapse${NotificationAccordionCount}" class="collapse" aria-labelledby="notificationHeading${NotificationAccordionCount}">
                    <div class="accordion-body">
                    <input type="hidden" name="repairs[${NotificationAccordionCount - 1}][r_id]" value="">
                      <div class=" row main-content div" id="">
      
                          <div class="col-lg-12">
                              
                              <div class="row mb-2">
                                  <div class="col-lg-3 spacing-right">
                                  Serial No. <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][serial_no]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Description <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_desc]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Amount of Bill <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_amount]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Payment Made By <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_pay_by]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                    Date <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_date]" type="date" placeholder="..." style="width: 100%;">
                                </div>
                                  <h5>Vendor Details :</h5>
                                  <div class="col-lg-3 spacing-right">
                                      Company Name : <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][repair_company_name]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Name <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_name]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Web <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_web]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Email <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_email]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Cell Number : <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_cell]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <h5>Address</h5>
                                  <div class="col-lg-3 spacing-right">
                                    Office No. : <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_office]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      Floor No. <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_floor]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Building <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_building]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Block <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_block]" type="text" placeholder="..." style="width: 100%;">
                                  </div>

                                  <div class="col-lg-3 spacing-right">
                                    Area <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_area]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-left spacing-right">
                                      City <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_city]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Photograph of Location <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_loc]" type="file" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-lg-3 spacing-right">
                                      Pin Location <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_poc_pin]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                              </div>
                          </div>
                          <h5>Any Warranty :</h5>
                          <div class="row mb-2">
                              <div class="col-lg-6 spacing-left spacing-right mt-2">
                              Any Warranty <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][r_warranty]" type="file" placeholder="..." style="width: 70%;" multiple>
                              </div>
                              <div class="col-lg-6 spacing-right mt-2">
                              Notes <br>
                              <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="repairs[${NotificationAccordionCount - 1}][warranty_note]"  rows="2" cols="38">
                              </textarea>
                              </div>
                              
                          </div>

                          <div class="row mb-2">
                            <div class="col-lg-6 spacing-right mt-2">
                            Notes <br>
                            <textarea id="w3review12" onclick="moveCursorToStart12()" oninput="trimSpaces12()" class="form-control" name="repairs[${NotificationAccordionCount - 1}][repair_note]" rows="2" cols="38">
                            </textarea>
                            </div>
                            <div class="col-lg-6 spacing-left spacing-right mt-2">
                                Attachments <br> <input class="form-control" name="repairs[${NotificationAccordionCount - 1}][repair_attach]" type="file" placeholder="..." style="width: 70%;" multiple>
                            </div>
                        </div>
                      </div>
                        
                    </div>
                    <button class="btn btn-danger btn-sm removeNotificationAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                  </div>
              </div>
          `;

          $('#notificationAccordion').append(newNotificationAccordion);
      });

      // Remove Accordion Button Click Event
      $(document).on('click', '.removeNotificationAccordion', function () {
          $(this).closest('.notificationaccordion-item').remove();
      });
  });
</script>

<script>
  $(document).ready(function () {
      // Function to update the notification summary table
      function updateNotificationSummaryTable() {
          // Clear existing rows
          $('#notificationSummaryTable tbody').empty();

          // Iterate through each notification accordion item and update the summary table
          $('.notificationaccordion-item').each(function (index) {
              var serialNo = $(this).find('[name="serial_no[]"]').val();
              var rdesc = $(this).find('[name="r_desc[]"]').val();
              var rAmount = $(this).find('[name="r_amount[]"]').val();

              // Check if any relevant data is entered
              if (serialNo || rdesc || rAmount) {
                  // Add a new row to the summary table
                  $('#notificationSummaryTable tbody').append(`
                      <tr>
                          <td>${index + 1}</td>
                          <td>${serialNo}</td>
                          <td>${rdesc}</td>
                          <td>${rAmount}</td>
                          <td><button type="button" style="width : 64%;" class="btn btn-primary view-notification-button" data-index="${index}">View</button></td>
                          <!-- Add more columns as needed -->
                      </tr>
                  `);
              }
          });
      }

      // Add More Notification Button Click Event
      $('#addNotification').on('click', function () {
          var notificationEntryCount = $('#notificationAccordion .notificationaccordion-item').length + 1;

          var newNotificationEntry = `
              <!-- Your existing notification accordion HTML goes here -->
          `;
          console.log('Adding notification entry:', notificationEntryCount);
          $('#notificationAccordion').append(newNotificationEntry);
      });

      // Update Notification Table Button Click Event
      $('#updateNotificationTable').on('click', function () {
          // Update the notification summary table
          updateNotificationSummaryTable();
      });

      // View Notification Button Click Event
      $(document).on('click', '.view-notification-button', function () {
          var index = $(this).data('index');
          var accordionItem = $('.notificationaccordion-item').eq(index);

          // Toggle the collapse state of the accordion item
          accordionItem.find('.collapse').collapse('toggle');
      });

      // Prevent the default behavior of the Add More Notification button
      $('#addNotification').on('click', function (event) {
          event.preventDefault();
      });
  });
</script>


{{-- /////// Usage Movement  \\\\\  --}}


<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addAccItem').on('click', function () {
            var itemAccordionCount = $('#itemAccordion .itemAccordion-item').length + 1;

            var newItemAccordion = `
                <div class="accordion-item itemAccordion-item" id="itemEntry${itemAccordionCount}">
                    <h2 class="accordion-header" id="itemHeading${itemAccordionCount}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white" data-toggle="collapse" data-target="#collapseItem${itemAccordionCount}" aria-expanded="false" aria-controls="collapseItem${itemAccordionCount}">
                            Usage/Movement Entry ${itemAccordionCount}
                        </button>
                    </h2>
                    <div id="collapseItem${itemAccordionCount}" class="collapse" aria-labelledby="itemHeading${itemAccordionCount}">
                        <div class="accordion-body">
                            <input type="hidden" name="usages[${itemAccordionCount - 1}][u_id]" value="">
                          <div id="vendorDetailsContainer">
                              
                              <div class="form-type col-lg-12 spacing-right">
                                    <div class="d-flex mt-2">
                                        <div class="col-lg-6 spacing-right">
                                            Vehicle No.  <br>  <input class="form-control" type="text" name="usages[${itemAccordionCount - 1}][usage_vehicle_no]" placeholder="..." style="width: 100%;">
                                        </div>
                                        <div class="col-lg-6 spacing-left spacing-right">
                                            Average Per Liter: <br>  <input class="form-control" type="text" name="usages[${itemAccordionCount - 1}][avg_per_liter]" placeholder="" style="width: 100%;">
                                        </div>
                                    </div>
                                  <div class="d-flex mt-2">
                                      <div class="col-md-3">
                                          Date <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][date_of_m]" type="date" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                          Time From <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][time_from]" type="time" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                          Time To  <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][time_to]" type="time" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                          Details Of Journey <br> <textarea class="form-control" name="usages[${itemAccordionCount - 1}][details_of_j]" type="text" placeholder="..." style="width: 100%;"></textarea>
                                      </div>
                                  </div>
                                  <div class="d-flex mt-2">
                                      <div class="col-md-3">
                                          Purpose Of Journey<br> <input class="form-control loi-price" name="usages[${itemAccordionCount - 1}][purpose_of_j]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                        Name of Officer <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][name_of_officer]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                        Meter Reading to <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][meter_reading_to]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                      <div class="col-md-3">
                                        Meter Reading From <br> <input class="form-control" name="usages[${itemAccordionCount - 1}][meter_reading_from]" type="text" placeholder="..." style="width: 100%;">
                                      </div>
                                  
                                  </div>
                              </div>
                              <div class="d-flex">
                                  <div class="col-md-3 spacing-left">
                                    Distance Covered <input class="form-control" type="text" name="usages[${itemAccordionCount - 1}][distance_covered]" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-md-3">
                                    Signature<br> <input class="form-control" name="usages[${itemAccordionCount - 1}][signature]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-md-3">
                                    P.O.L Drawn<br> <input class="form-control" name="usages[${itemAccordionCount - 1}][p_o_l]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  <div class="col-md-3">
                                    Remarks<br> <input class="form-control" name="usages[${itemAccordionCount - 1}][remarks]" type="text" placeholder="..." style="width: 100%;">
                                  </div>
                                  
                              </div>
                              
                          </div> 
                        </div>
                        <button class="btn btn-danger btn-sm removeItemAccordion mx-5 my-3" type="button" style="padding:10px 25p; border-radius: 9px;">Remove</button>
                    </div>
                </div>
            `;
            console.log('Adding accordion item:', itemAccordionCount);
            $('#itemAccordion').append(newItemAccordion);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeItemAccordion', function () {
            $(this).closest('.itemAccordion-item').remove();
        });
    });
</script>


{{-- /////// Item Accordion Summary \\\\\\\ --}}
<script>
    $(document).ready(function () {
        function updateItemSummaryTableAndCalculateSum() {
            
            $('#itemSummaryTable tbody').empty();
    
            var totalAmountSum = 0; 
            $('.itemAccordion-item').each(function (index) {
                var dateOfM = $(this).find('[name="date_of_m[]"]').val();
                var nameOfOfficer = $(this).find('[name="name_of_officer[]"]').val();
                var distanceCovered = $(this).find('[name="distance_covered[]"]').val();
                var pOL = $(this).find('[name="p_o_l[]"]').val();
    
                if (dateOfM || nameOfOfficer || distanceCovered || pOL) {

                    $('#itemSummaryTable tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${dateOfM}</td>
                            <td>${nameOfOfficer}</td>
                            <td>${distanceCovered}</td>
                            <td>${pOL}</td>
                            <td><button type="button" style="width : 65%;" class="btn btn-primary view-button-1" data-target="#collapseItem${index + 1}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
    
            $('[name="estimated_amount_loi"]').val(totalAmountSum.toFixed(2));
        }
    
        $('#addToItemTable').on('click', function () {
            updateItemSummaryTableAndCalculateSum();
        });
    
        // View Button Click Event
        $(document).on('click', '.view-button-1', function () {
            var targetId = $(this).data('target');
            $(targetId).collapse('toggle');
        });
    
        // Prevent the default behavior of the Add More button
        $('#addAccItem').on('click', function (event) {
            event.preventDefault();
        });
    });
</script>


<!-- Script for renewal  -->
<script>
    $(document).ready(function () {
        // Add More Button Click Event
        $('#addSignatory12').on('click', function () {
            var SignatoryAccordionCount12 = $('#signatoryAccordion12 .signaccordion-item12').length + 1;

            var newSignAccordion12 = `
                <div class="accordion-item signaccordion-item12" id="signatoryEntry12${SignatoryAccordionCount12}">
                    <h2 class="accordion-header" id="signatoryHeading12${SignatoryAccordionCount12}">
                        <button class="accordion-button" type="button" style="background-color: #34005A; color:white"  data-toggle="collapse" data-target="#signatoryCollapse12${SignatoryAccordionCount12}" aria-expanded="false" aria-controls="signatoryCollapse12${SignatoryAccordionCount12}">
                            Notification Entry ${SignatoryAccordionCount12}
                        </button>
                    </h2>
                    <div id="signatoryCollapse12${SignatoryAccordionCount12}" class="collapse" aria-labelledby="signatoryHeading12${SignatoryAccordionCount12}">
                        <div class="accordion-body">
                            <input type="hidden" name="notifications[${SignatoryAccordionCount12 - 1}][n_id]" value="">
                            <div class="col-lg-12 spacing-right">
                                <div class="row mb-2">
                                    <div class="col-lg-3 spacing-right">
                                        Notification No.  <br>  <input class="form-control" type="text" name="notifications[${SignatoryAccordionCount12 - 1}][notification_no]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3 spacing-right">
                                        Notification Related to  <br>  <input class="form-control" type="text" name="notifications[${SignatoryAccordionCount12 - 1}][notification_related]" placeholder="..." style="width: 100%;">
                                    </div>
                                    <div class="col-lg-3">
                                        Notes. <br>  <textarea class="form-control" type="text" name="notifications[${SignatoryAccordionCount12 - 1}][notification_notes]" placeholder="..." style="width: 100%;"></textarea>
                                    </div>
                                    <div class="col-lg-4 spacing-left">
                                        Attachment. <br>  <input class="form-control" type="file" name="notifications[${SignatoryAccordionCount12 - 1}][notification_attach]" placeholder="..." style="width: 100%;">
                                        </div>

                                </div>
                                <h5>Notification To :</h5>
                                <div class="row">
                                    <div class="col-lg-3 spacing-right">
                                        Notification Shared with <br>  <input class="form-control" type="text" name="notifications[${SignatoryAccordionCount12 - 1}][notification_to]" placeholder="..." style="width: 100%;">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger removeSignAccordion12" type="button" style="width:10%; margin-left:13px;">
                            Remove
                        </button>
                    </div>
                </div>
            `;

            $('#signatoryAccordion12').append(newSignAccordion12);
        });

        // Remove Accordion Button Click Event
        $(document).on('click', '.removeSignAccordion12', function () {
            $(this).closest('.signaccordion-item12').remove();
        });
    });
</script>
<!-- Script for show data for renewal in table  -->
<script>
    $(document).ready(function () {
        // Function to update summary table for Vehicle entries
        // Function to update summary table for Vehicle entries
        function updateSignatorySummaryTable12() {
            // Clear existing rows
            $('#signatorySummaryTable12 tbody').empty();

            // Iterate through each guard accordion item and update the summary table
            $('.signaccordion-item12').each(function (index) {
                var notificationNo = $(this).find('[name="notification_no[]"]').val();
                var notificationRelated = $(this).find('[name="notification_related[]"] option:selected').text(); // Retrieve selected option text
                var notificationTo = $(this).find('[name="notification_to[]"] option:selected').text(); // Retrieve selected option text
                // Check if any relevant data is entered
                if (notificationNo || notificationRelated || notificationTo) {
                    // Add a new row to the summary table
                    $('#signatorySummaryTable12 tbody').append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${notificationNo}</td>
                            <td>${notificationRelated}</td>
                            <td>${notificationTo}</td>
                            <td><button type="button" class="btn btn-primary view-signatory-button" style="width: 100%" data-index="${index}">View</button></td>
                            <!-- Add more columns as needed -->
                        </tr>
                    `);
                }
            });
        }

        $(document).ready(function () {
            // Add More Signatory Button Click Event
            $('#addSignatory12').on('click', function () {
                var signatoryEntryCount12 = $('#signatoryAccordion12 .signaccordion-item12').length + 1;

                var newSignatoryEntry12 = `
                    <!-- Your existing signatory accordion HTML goes here -->
                `;

                console.log('Adding signatory entry:', signatoryEntryCount12);
                $('#signatoryAccordion12').append(newSignatoryEntry12);

                // Update the signatory summary table
                updateSignatorySummaryTable12();
            });

            // Update Signatory Table Button Click Event
            $('#updateSignatoryTable12').on('click', function () {
                // Update the signatory summary table
                console.log("clicked save");
                updateSignatorySummaryTable12();
            });

            // View Signatory Button Click Event
            $(document).on('click', '.view-signatory-button', function () {
                var index = $(this).data('index');
                var accordionItem = $('.signaccordion-item12').eq(index);

                // Toggle the collapse state of the accordion item
                accordionItem.find('.collapse').collapse('toggle');
            });

            // Remove Signatory Entry Button Click Event
            $(document).on('click', '.removeSignAccordion12', function () {
                $(this).closest('.signaccordion-item12').remove();
                // Update the signatory summary table
                updateSignatorySummaryTable12();
            });

            // Prevent the default behavior of the Add More Signatory button
            $('#addSignatory12').on('click', function (event) {
                event.preventDefault();
            });
        });

    });
</script>