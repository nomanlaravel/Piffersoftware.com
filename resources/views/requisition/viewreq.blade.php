@include('layouts.header')

@yield('main')

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

    <div class="modal-body">
        <section>
            <form action={{ route('update.req' , $requisition->id) }} method="POST" class="liscence_form border-0"
                style="width: 90%;" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Demand Raised By Section -->
                <div class="row main-content div">
                    <h5>Demand Raised By :</h5>
                    <div class="row mb-2">
                        <div class="col-lg-6 spacing-right">
                            Name : <br>
                            <input class="form-control" readonly type="text" name="demand_person_name"
                                value="{{ $requisition->demand_person_name }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-6 mt-1">
                            Employee ID <br> <input class="form-control" readonly type="text" name="demand_employee_id"
                                value="{{ $requisition->demand_employee_id }}" placeholder="..." style="width: 100%;">
                        </div>
                        <div class="col-lg-4 mt-1">
                            Cell No. <br> <input class="form-control" readonly name="demand_person_cell"
                                value="{{ $requisition->demand_person_cell }}" type="text" placeholder="..."
                                style="width: 100%;">
                        </div>
                               <div class="col-lg-4 mt-1">
                                        Demand Raised By. <br> <input class="form-control" name="demand_raised_by" readonly value="{{ $requisition->demand_raised_by }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                                      <div class="col-lg-4 mt-1">
                                        Demand Raised To. <br> <input class="form-control" name="demand_raised_to" readonly value="{{ $requisition->demand_raised_to }}" type="text" placeholder="..."
                                            style="width: 100%;">
                                    </div>
                    </div>

                    <!-- Requisition Reports Accordion Section -->
                    <div class="container my-1">
                        <div class="accordion" id="signatoryAccordion10">
                            @foreach($requisition->reqreports as $index => $report)
                            <div class="accordion-item signaccordion-item10" id="signatoryEntry10">
                                <h2 class="accordion-header" id="signatoryHeading{{ $index + 1 }}" style="color: white">
                                    <button class="accordion-button" style="background-color: #34005A; color:white" type="button" aria-expanded="true" aria-controls="signatoryCollapse{{ $index + 1 }}">
                                        Report Entry {{ $index + 1 }}
                                    </button>
                                </h2>
                                <div id="signatoryCollapse{{ $index + 1 }}" class="accordion-body show" aria-labelledby="signatoryHeading{{ $index + 1 }}">
                                    <div class="row mb-2">
                                        <input type="hidden" name="reqreports[{{ $index }}][r_id]" value="{{ $report->id }}">
                                        <!-- Your content for signatory entry goes here -->
                                        <div class="row mb-2">
                                            <div class="col-lg-6 spacing-right">
                                                Date : <br>
                                                <input class="form-control" readonly type="date" name="reqreports[{{ $index }}][date]" value="{{ $report->date }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Requisition Number : <br>
                                                <input class="form-control" readonly type="text" name="reqreports[{{ $index }}][requisition_no]" value="{{ $report->requisition_no }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Item Name : <br>
                                                <input class="form-control" readonly type="text" name="reqreports[{{ $index }}][item_name]" value="{{ $report->item_name }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Item Code <br>
                                                <input class="form-control" readonly type="text" name="reqreports[{{ $index }}][item_code]" value="{{ $report->item_code }}" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Quantity <br>
                                                <input class="form-control" readonly name="reqreports[{{ $index }}][quantity]" value="{{ $report->quantity }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1 spacing-right">
                                                Description : <br>
                                                <input class="form-control" readonly name="reqreports[{{ $index }}][description]" value="{{ $report->description }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 spacing-right">
                                                Manufacturing : <br>
                                                <input class="form-control" readonly name="reqreports[{{ $index }}][manufacturing]" value="{{ $report->manufacturing }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Size <br>
                                                <input class="form-control" readonly name="reqreports[{{ $index }}][size]" value="{{ $report->size }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Article No. <br>
                                                <input class="form-control" readonly name="reqreports[{{ $index }}][article_no]" value="{{ $report->article_no }}" type="text" placeholder="..." style="width: 100%;">
                                            </div>
                                            <div class="col-lg-6 mt-1">
                                                Any Special Instructions <br>
                                                <textarea class="form-control mt-1" name="reqreports[{{ $index }}][any_special_ins]" readonly type="text" placeholder="..." style="width: 100%;">{{ $report->any_special_ins }}</textarea>
                                            </div>
                                            <div class="col-lg-6">
                                                Notes <br>
                                                <textarea class="form-control mt-1" name="reqreports[{{ $index }}][notes]" readonly type="text" placeholder="..." style="width: 100%;">{{ $report->notes }}</textarea>
                                            </div>
                                            <div class="col-lg-6">
                                                Attachments <br>
                                                <input class="form-control mt-1" name="reqreports[{{ $index }}][attachments]" type="file" placeholder="..." style="width: 100%;">
                                                @if($report->attachments)
                                                <a href="{{ asset($report->attachments) }}" target="_blank">View Attachment</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </form>
        </section>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script> <!-- script for add more consultant details -->

<script>
   $(document).ready(function () {
    var openAccordions = []; // Array to store IDs of open accordion items

    // Add More Button Click Event
    $('#addSignatory10').on('click', function () {
        var SignatoryAccordionCount10 = $('#signatoryAccordion10 .signaccordion-item10').length;
        var newIndex = SignatoryAccordionCount10; // New index for new entry

        var newSignAccordion10 = `
            <div class="accordion-item signaccordion-item10">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" style="background-color: #34005A; color:white" data-bs-toggle="collapse" data-bs-target="#signatoryCollapse10${newIndex}" aria-expanded="false" aria-controls="signatoryCollapse10${newIndex}">
                        Report Entry ${newIndex + 1}
                    </button>
                </h2>
                <div id="signatoryCollapse10${newIndex}" class="collapse" aria-labelledby="signatoryHeading10${newIndex}" data-bs-parent="#signatoryAccordion10">
                    <div class="accordion-body">
                        <input type="hidden" name="reqreports[${newIndex}][r_id]" value="">
                        <!-- Your content for signatory entry goes here -->
                        <div class="row mb-2">
                            <div class="col-lg-6 spacing-right">
                                Date : <br>
                                <input class="form-control" readonly type="date" name="reqreports[${newIndex}][date]" value="" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 spacing-right">
                                Item Name : <br>
                                <input class="form-control" readonly type="text" name="reqreports[${newIndex}][item_name]" value="" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 mt-1">
                                Item Code <br>
                                <input class="form-control" readonly type="text" name="reqreports[${newIndex}][item_code]" value="" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 mt-1">
                                Quantity <br>
                                <input class="form-control" readonly name="reqreports[${newIndex}][quantity]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 mt-1 spacing-right">
                                Description : <br>
                                <input class="form-control" readonly name="reqreports[${newIndex}][description]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 spacing-right">
                                Manufacturing : <br>
                                <input class="form-control" readonly name="reqreports[${newIndex}][manufacturing]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 mt-1">
                                Size <br>
                                <input class="form-control" readonly name="reqreports[${newIndex}][size]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 mt-1">
                                Article No. <br>
                                <input class="form-control" readonly name="reqreports[${newIndex}][article_no]" value="" type="text" placeholder="..." style="width: 100%;">
                            </div>
                            <div class="col-lg-6 mt-1">
                                Any Special Instructions <br>
                                <textarea class="form-control mt-1" name="reqreports[${newIndex}][any_special_ins]" type="text" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-6">
                                Notes <br>
                                <textarea class="form-control mt-1" name="reqreports[${newIndex}][notes]" type="text" placeholder="..." style="width: 100%;"></textarea>
                            </div>
                            <div class="col-lg-6">
                                Attachments <br>
                                <input class="form-control mt-1" name="reqreports[${newIndex}][attachments]" type="file" placeholder="..." style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;

        $('#signatoryAccordion10').append(newSignAccordion10);
    });

    // Bootstrap 5 collapse event handlers
    $('#signatoryAccordion10').on('show.bs.collapse', function (e) {
        var targetId = e.target.id;
        openAccordions.push(targetId);
    });

    $('#signatoryAccordion10').on('hide.bs.collapse', function (e) {
        var targetId = e.target.id;
        var index = openAccordions.indexOf(targetId);
        if (index !== -1) {
            openAccordions.splice(index, 1);
        }
    });
});



</script>



